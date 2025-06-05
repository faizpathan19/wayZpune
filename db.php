<?php
$servername = "localhost";
$username = "root"; // Default XAMPP MySQL username
$password = ""; // Leave empty in XAMPP
$database = "triptopia_db"; // Database name

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
