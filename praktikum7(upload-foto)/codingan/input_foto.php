<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Upload Gambar</title>
</head>
<body>
  <form method="post" action="proses.php" enctype="multipart/form-data">
    <table border="1" cellpadding="6">
      <tr><th colspan="2">SIMPAN & TAMPIL GAMBAR</th></tr>
      <tr>
        <td>Masukan Nama</td>
        <td>Pilih Foto</td>
      </tr>
      <tr>
        <td><input type="text" name="nama" placeholder="masukan nama" required></td>
        <td><input type="file" name="foto" accept="image/*" required></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="kirim" value="SIMPAN"></td>
      </tr>
    </table>
  </form>
  <p><a href="tampil_foto.php">Lihat Semua Foto</a></p>
</body>
</html>
