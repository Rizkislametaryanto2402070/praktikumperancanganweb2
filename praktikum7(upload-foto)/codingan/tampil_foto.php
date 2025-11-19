<?php
include 'koneksi.php';

$sql = "SELECT * FROM namasiswa ORDER BY id DESC";
$res = mysqli_query($conn, $sql);
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Halaman Tampil Foto</title></head>
<body>
<table width="600" border="1" cellpadding="6" cellspacing="0">
  <tr>
    <th colspan="4">MENAMPILKAN FOTO / <a href="input_foto.php">TAMBAH DATA</a></th>
  </tr>
  <tr>
    <td>NO</td>
    <td>NAMA</td>
    <td>FOTO</td>
    <td>DELETE</td>
  </tr>
<?php
$no = 1;
while ($data = mysqli_fetch_assoc($res)) {
    $id = $data['id'];
    $nama = htmlspecialchars($data['nama']);
    $foto = htmlspecialchars($data['foto']);
    echo "<tr>";
    echo "<td>$no</td>";
    echo "<td>$nama</td>";
    echo "<td align='center'><img src='gambar/$foto' width='60' height='80' alt=''></td>";
    echo "<td><a href='delete.php?del=$id' onclick=\"return confirm('Hapus data ini?')\">DELETE</a></td>";
    echo "</tr>";
    $no++;
}
?>
</table>
</body>
</html>
