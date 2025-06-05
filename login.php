<?php
session_start();
include "db.php"; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"] ?? '');
    $password = trim($_POST["password"] ?? '');

    if (!empty($email) && !empty($password)) {
        $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];

                // Redirect back to home page
                header("Location: wayZpune.html");
                exit();
            } else {
                $_SESSION['error'] = "Invalid password!";
                header("Location: login.html");
                exit();
            }
        } else {
            $_SESSION['error'] = "User not found!";
            header("Location: login.html");
            exit();
        }

        $stmt->close();
    } else {
        $_SESSION['error'] = "Please enter email and password!";
        header("Location: login.html");
        exit();
    }
}

$conn->close();
?>
