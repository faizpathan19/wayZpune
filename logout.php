<?php
session_start();
$_SESSION = []; // Clear session data
session_unset(); // Unset all session variables
session_destroy(); // Destroy session

header("Location: wayZpune.html"); // Redirect back to home page
exit();
?>
