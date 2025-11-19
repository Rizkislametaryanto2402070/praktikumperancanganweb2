<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "foto";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Gagal koneksi: " . mysqli_connect_error());
}
// jangan echo apapun di file ini
?>
