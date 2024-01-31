<?php
require("connection.php");

// Unset all of the session variables
$_SESSION = array();

// If the session is set, destroy the session
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session
session_unset();
session_destroy();

// Redirect to the desired page after logging out
header("Location: login.php");
exit;
?>