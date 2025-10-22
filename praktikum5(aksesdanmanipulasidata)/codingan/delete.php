<?php
require 'koneksi.php';
if (!isset($_GET['nim'])) { header('Location:index.php'); exit; }
$nim = $_GET['nim'];
// opsi: minta konfirmasi di client (kita sudah tambahkan confirm di index.php)
// proses hapus:
$sql = "DELETE FROM mahasiswa WHERE nim = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $nim);
if (mysqli_stmt_execute($stmt)) {
    header("Location: index.php");
    exit;
} else {
    echo "Gagal hapus: " . mysqli_error($conn);
}
?>
