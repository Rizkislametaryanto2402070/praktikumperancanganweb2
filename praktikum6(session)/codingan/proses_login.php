<?php
// proses_login.php
session_start();
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php'); exit;
}

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

if ($username === '' || $password === '') {
    echo "Username dan password wajib diisi. <a href='login.php'>Kembali</a>";
    exit;
}

// ambil data user
$sql = "SELECT username, password, gender FROM login WHERE username = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$user) {
    echo "Username tidak ditemukan. <a href='login.php'>Kembali</a>";
    exit;
}

// verifikasi password
if (password_verify($password, $user['password'])) {
    // set session
    $_SESSION['username'] = $user['username'];
    $_SESSION['gender'] = $user['gender'];
    // redirect ke dashboard
    header('Location: dashboard.php'); exit;
} else {
    echo "Password salah. <a href='login.php'>Kembali</a>";
    exit;
}
?>
