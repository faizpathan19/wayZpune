<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include "db.php"; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $email = trim($_POST["email"] ?? '');
    $password = trim($_POST["password"] ?? '');

    if (!empty($email) && !empty($password)) {
        // Prepare SQL statement
        $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ?");
        if (!$stmt) {
            die("Prepare statement failed: " . $conn->error);
        }
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if (!$result) {
            die("Query execution failed: " . $conn->error);
        }

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            // Verify password
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];

                // Redirect only if login is successful
                header("Location: ../gitub.html");
                exit();
    //         } else {
    //             $_SESSION['error'] = "Invalid password!";
    //             header("Location: login.html");
    //             exit();
    //         }
    //     } else {
    //         $_SESSION['error'] = "User not found!";
    //         header("Location: login.html");
    //         exit();
    //     }

    //     $stmt->close();
    // } else {
    //     $_SESSION['error'] = "Please enter email and password!";
    //     header("Location: login.html");
        exit();
    }
} 
  
$conn->close()   