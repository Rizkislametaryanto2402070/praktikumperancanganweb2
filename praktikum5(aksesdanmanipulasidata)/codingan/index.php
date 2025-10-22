<?php
require 'koneksi.php';
$sql = "SELECT nim, nama, alamat, created_at FROM mahasiswa ORDER BY created_at DESC";
$res = mysqli_query($conn, $sql);
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Daftar Mahasiswa</title></head>
<body>
<h2>Daftar Mahasiswa</h2>
<a href="add.php">Tambah Data</a>
<table border="1" cellpadding="6" cellspacing="0">
<tr><th>#</th><th>NIM</th><th>Nama</th><th>Alamat</th><th>Dibuat</th><th>Aksi</th></tr>
<?php
$i=1;
while($row = mysqli_fetch_assoc($res)){
    echo "<tr>";
    echo "<td>".$i++."</td>";
    echo "<td>".htmlspecialchars($row['nim'])."</td>";
    echo "<td>".htmlspecialchars($row['nama'])."</td>";
    echo "<td>".htmlspecialchars($row['alamat'])."</td>";
    echo "<td>".$row['created_at']."</td>";
    echo "<td>
            <a href='edit.php?nim=".urlencode($row['nim'])."'>Edit</a> |
            <a href='delete.php?nim=".urlencode($row['nim'])."' onclick=\"return confirm('Hapus data NIM: ".$row['nim']."?')\">Hapus</a>
          </td>";
    echo "</tr>";
}
?>
</table>
</body>
</html>
