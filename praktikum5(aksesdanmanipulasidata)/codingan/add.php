<?php require 'koneksi.php'; ?>
<!doctype html><html><head><meta charset="utf-8"><title>Tambah</title></head><body>
<h2>Tambah Mahasiswa</h2>
<form action="proses_add.php" method="post">
  <label>NIM:</label><br><input type="text" name="nim" required><br><br>
  <label>Nama:</label><br><input type="text" name="nama" required><br><br>
  <label>Alamat:</label><br><input type="text" name="alamat"><br><br>
  <input type="submit" value="Simpan">
  <a href="index.php">Batal</a>
</form>
</body></html>
