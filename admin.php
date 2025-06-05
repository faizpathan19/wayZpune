<?php
include 'db.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_id = $_POST['admin_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
    $phone = $_POST['phone'];

    // Insert query
    $sql = "INSERT INTO admin_users (admin_id, name, email, password, phone) VALUES (?, ?, ?, ?, ?)";

    // Prepare statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $admin_id, $name, $email, $password, $phone);

    if ($stmt->execute()) {
        echo "<script>alert('Signup Successful! Redirecting to Home Page...'); window.location='wayZpune.html';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "'); window.history.back();</script>";
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
