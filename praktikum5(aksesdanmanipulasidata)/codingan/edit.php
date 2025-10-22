<?php
require 'koneksi.php';
if (!isset($_GET['nim'])) { header('Location: index.php'); exit; }
$nim = $_GET['nim'];
$sql = "SELECT nim, nama, alamat FROM mahasiswa WHERE nim = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $nim);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($res);
if (!$row) { echo "Data tidak ditemukan"; exit; }
?>
<!doctype html><html><head><meta charset="utf-8"><title>Edit</title></head><body>
<h2>Edit Mahasiswa</h2>
<form action="proses_edit.php" method="post">
  <input type="hidden" name="nim" value="<?= htmlspecialchars($row['nim']) ?>">
  <label>Nama:</label><br><input type="text" name="nama" value="<?= htmlspecialchars($row['nama']) ?>" required><br><br>
  <label>Alamat:</label><br><input type="text" name="alamat" value="<?= htmlspecialchars($row['alamat']) ?>"><br><br>
  <input type="submit" value="Update">
  <a href="index.php">Batal</a>
</form>
</body></html>
