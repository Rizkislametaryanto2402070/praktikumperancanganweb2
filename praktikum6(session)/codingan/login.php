<?php
// login.php
session_start();
if (isset($_SESSION['username'])) {
    header('Location: dashboard.php'); exit;
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Login</title></head>
<body>
<h2>Login</h2>
<form action="proses_login.php" method="post">
  <label>Username:</label><br>
  <input type="text" name="username" required><br><br>

  <label>Password:</label><br>
  <input type="password" name="password" required><br><br>

  <input type="submit" value="Login">
</form>

<p>Belum punya akun? <a href="register.php">Daftar</a></p>
</body>
</html>
