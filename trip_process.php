<?php
session_start();
include "db.php"; // Database connection

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please log in first!'); window.location.href='login.html';</script>";
    exit();
}

// Get form data
$user_id = $_SESSION['user_id'];
$start_location = $_POST['start_location'];
$destination = $_POST['destination'];
$days = $_POST['days'];
$people = $_POST['people'];
$travel_mode = $_POST['travel_mode'];
$experience_level = $_POST['experience_level'];
$preferences = $_POST['preferences'];

// Insert into database
$stmt = $conn->prepare("INSERT INTO trips (user_id, start_location, destination, days, people, travel_mode, experience_level, preferences) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isssisss", $user_id, $start_location, $destination, $days, $people, $travel_mode, $experience_level, $preferences);

if ($stmt->execute()) {
    echo "<script>alert('Trip booked successfully!'); window.location.href='wayZpune.html';</script>";
} else {
    echo "<script>alert('Error booking trip. Try again!'); window.location.href='PAT.html';</script>";
}

$stmt->close();
$conn->close();
