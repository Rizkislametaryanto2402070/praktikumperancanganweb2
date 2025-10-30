<?php
// koneksi.php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'coba'; // ganti sesuai nama DB

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
// jangan echo di sini
?>
