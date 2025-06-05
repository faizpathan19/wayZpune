<?php
include "db.php"; // Include database connection

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['signup'])) {
    // Sanitize inputs
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash(trim($_POST['password']), PASSWORD_BCRYPT);
    $phone = trim($_POST['phone']);

    // Check if email already exists using a prepared statement
    $checkEmail = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $checkEmail->bind_param("s", $email);
    $checkEmail->execute();
    $checkEmail->store_result();

    if ($checkEmail->num_rows > 0) {
        echo "Email already registered!";
    } else {
        // Insert user into database using prepared statements
        $sql = $conn->prepare("INSERT INTO users (name, email, password, phone) VALUES (?, ?, ?, ?)");
        $sql->bind_param("ssss", $name, $email, $password, $phone);

        if ($sql->execute()) {
            header("Location: login.html"); // Redirect to login page
            exit();
        } else {
            echo "Error: " . $sql->error;
        }
    }

    // Close statements
    $checkEmail->close();
    $sql->close();
}

// Close database connection
$conn->close();
?>
