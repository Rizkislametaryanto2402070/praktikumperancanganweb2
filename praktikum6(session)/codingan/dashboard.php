<?php
// dashboard.php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php'); exit;
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Dashboard</title></head>
<body>
<h2>Selamat datang, <?= htmlspecialchars($_SESSION['username']); ?></h2>
<p>Gender: <?= ($_SESSION['gender'] === 'L') ? 'Laki-laki' : 'Perempuan'; ?></p>

<p><a href="logout.php">Logout</a></p>
</body>
</html>
