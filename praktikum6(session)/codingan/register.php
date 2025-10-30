<?php
// register.php
session_start();
if (isset($_SESSION['username'])) {
    header('Location: dashboard.php'); exit;
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Register</title></head>
<body>
<h2>Form Pendaftaran</h2>
<form action="proses_register.php" method="post">
  <label>Username:</label><br>
  <input type="text" name="username" required><br><br>

  <label>Password:</label><br>
  <input type="password" name="password" required><br><br>

  <label>Gender:</label><br>
  <select name="gender">
    <option value="L">Laki-laki</option>
    <option value="P">Perempuan</option>
  </select><br><br>

  <input type="submit" value="Daftar">
</form>

<p>Sudah punya akun? <a href="login.php">Login</a></p>
</body>
</html>
