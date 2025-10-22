<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = $_POST['nim'] ?? '';
    $nama = $_POST['nama'] ?? '';
    $alamat = $_POST['alamat'] ?? '';

    // basic validation
    if ($nim === '' || $nama === '') {
        die("NIM dan Nama wajib diisi. <a href='add.php'>Kembali</a>");
    }

    $sql = "INSERT INTO mahasiswa (nim, nama, alamat) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $nim, $nama, $alamat);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menyimpan: " . mysqli_error($conn);
    }
}
?>
