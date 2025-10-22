<?php
require 'koneksi.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    $sql = "UPDATE mahasiswa SET nama = ?, alamat = ? WHERE nim = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $nama, $alamat, $nim);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal update: " . mysqli_error($conn);
    }
}
?>
