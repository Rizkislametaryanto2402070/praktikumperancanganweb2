<?php
// proses_register.php
session_start();
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: register.php'); exit;
}

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';
$gender   = $_POST['gender'] ?? 'L';

// validasi sederhana
if ($username === '' || $password === '') {
    echo "Username dan password wajib diisi. <a href='register.php'>Kembali</a>";
    exit;
}

// cek apakah username sudah ada
$sql = "SELECT username FROM login WHERE username = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

if (mysqli_stmt_num_rows($stmt) > 0) {
    echo "Username sudah terdaftar. Pilih username lain. <a href='register.php'>Kembali</a>";
    exit;
}
mysqli_stmt_close($stmt);

// hash password
$hash = password_hash($password, PASSWORD_DEFAULT);

// simpan ke database
$sql = "INSERT INTO login (username, password, gender) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sss", $username, $hash, $gender);

if (mysqli_stmt_execute($stmt)) {
    echo "User berhasil terdaftar. <a href='login.php'>Login sekarang</a>";
} else {
    echo "Error: " . mysqli_error($conn);
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
