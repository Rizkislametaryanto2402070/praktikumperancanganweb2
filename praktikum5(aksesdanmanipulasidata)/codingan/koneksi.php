<?php
// koneksi.php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "praktikum_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
// Jangan echo anything di file ini saat di-include
?>
