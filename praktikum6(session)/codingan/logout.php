<?php
// logout.php
session_start();
// hapus semua session
$_SESSION = [];
// hapus session cookie (opsional tapi bagus)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
session_destroy();
header('Location: login.php'); exit;
?>
