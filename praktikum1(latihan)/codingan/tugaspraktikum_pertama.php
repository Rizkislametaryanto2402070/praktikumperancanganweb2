<html>
<head>
<title> Contoh </title>
</head>
<body>
<?php
// Biodata
echo "Nama : Rizki Slamet Aryanto <br>";
echo "NIM : 2402070 <br>";
echo "Prodi : Teknik Informatika <br>";
echo "Kelas : TI 3B <br><br>";

// variabel
$a = 6;
$b = 1;
$c = 2;
$d = 2;
$e = 3;
// Hitung
$hasil = (($a + $b) / ($c * $d)) - $e;
// Hasil
echo "a = $a <br>";
echo "b = $b <br>";
echo "c = $c <br>";
echo "d = $d <br>";
echo "e = $e <br><br>";
echo "Hasil perhitungan ((a+b)/(c*d))-e adalah: $hasil <br><br>";

// Variabel
$x = 6;
$y = 1;
// Penjumlahan & Pengurangan
echo "Penjumlahan dan Pengurangan : <br>";
echo "$x + $y = " . ($x + $y) . "<br>";
echo "$x - $y = " . ($x - $y) . "<br><br>";
// Perkalian
echo "Perkalian : <br>";
echo "$x * 2 = " . ($x * 2) . "<br>";
echo "$x * 2.5 = " . ($x * 2.5) . "<br><br>";
// Pembagian
echo "Pembagian : <br>";
echo "$x / 4 = " . ($x / 4) . "<br>";
echo "$x / 4.0 = " . ($x / 4.0) . "<br>";
echo "$x % 5 = " . ($x % 5) . "<br>";
echo "$x % 4 = " . ($x % 4) . "<br>";
echo "$x % 3 = " . ($x % 3) . "<br>";
?>
</body>
</html>