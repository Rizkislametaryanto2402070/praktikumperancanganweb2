<?php
include 'koneksi.php';

// cek request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: input_foto.php');
    exit;
}

$nama = trim($_POST['nama'] ?? '');
if ($nama === '') {
    echo "Nama masih kosong. <a href='input_foto.php'>Kembali</a>";
    exit;
}

if (!isset($_FILES['foto'])) {
    echo "File tidak ditemukan. <a href='input_foto.php'>Kembali</a>";
    exit;
}

$fileName = $_FILES['foto']['name'];
$tmpName  = $_FILES['foto']['tmp_name'];
$fileSize = $_FILES['foto']['size'];
$error    = $_FILES['foto']['error'];

if ($error !== UPLOAD_ERR_OK) {
    echo "Error upload file. Kode error: $error <a href='input_foto.php'>Kembali</a>";
    exit;
}

// validasi ekstensi & ukuran
$ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
$allowed = ['jpg','jpeg','png','gif'];
$maxSize = 1 * 1024 * 1024; // 1 MB

if (!in_array($ext, $allowed)) {
    echo "Tipe file tidak diperbolehkan. Hanya: jpg, jpeg, png, gif. <a href='input_foto.php'>Kembali</a>";
    exit;
}

if ($fileSize > $maxSize) {
    echo "Ukuran file terlalu besar (max 1 MB). <a href='input_foto.php'>Kembali</a>";
    exit;
}

// buat nama file unik untuk mencegah konflik
$newName = uniqid('img_') . '.' . $ext;
$targetDir = __DIR__ . '/gambar/';
$targetPath = $targetDir . $newName;

// pindahkan file
if (!move_uploaded_file($tmpName, $targetPath)) {
    echo "Gagal menyimpan file. Pastikan direktori 'gambar' writable. <a href='input_foto.php'>Kembali</a>";
    exit;
}

// simpan ke database
$sql = "INSERT INTO namasiswa (nama, foto) VALUES (?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ss", $nama, $newName);
if (mysqli_stmt_execute($stmt)) {
    echo "Berhasil disimpan<br/>";
    echo "Nama: " . htmlspecialchars($nama) . "<br/>";
    echo "<img src='gambar/" . htmlspecialchars($newName) . "' height='200'><br/>";
    echo "<br/><a href='tampil_foto.php'>Lihat Halaman Berikutnya</a>";
} else {
    // jika gagal insert, hapus file yg sudah diupload
    if (file_exists($targetPath)) unlink($targetPath);
    echo "Gagal menyimpan ke database: " . mysqli_error($conn);
}
?>
