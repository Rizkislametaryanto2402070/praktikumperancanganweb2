<?php
include 'koneksi.php';

if (!isset($_GET['del'])) {
    header('Location: tampil_foto.php');
    exit;
}

$del = (int) $_GET['del'];

// ambil record untuk nama file
$sql = "SELECT foto FROM namasiswa WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $del);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    echo "Data tidak ditemukan. <a href='tampil_foto.php'>Kembali</a>";
    exit;
}

$fotoFile = __DIR__ . '/gambar/' . $row['foto'];
// hapus file jika ada
if (file_exists($fotoFile)) {
    unlink($fotoFile);
}

// hapus record di DB
$sqlDel = "DELETE FROM namasiswa WHERE id = ?";
$stmt2 = mysqli_prepare($conn, $sqlDel);
mysqli_stmt_bind_param($stmt2, "i", $del);
if (mysqli_stmt_execute($stmt2)) {
    header('Location: tampil_foto.php');
    exit;
} else {
    echo "Gagal menghapus: " . mysqli_error($conn);
}
?>
