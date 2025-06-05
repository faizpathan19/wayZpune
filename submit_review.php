<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = $_POST['user_name'];
    $place_name = $_POST['place_name'];
    $category = $_POST['category'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];

    // ✅ Validate rating (1-5)
    if ($rating < 1 || $rating > 5) {
        echo "<script>alert('Rating must be between 1 and 5!'); window.history.back();</script>";
        exit();
    }

    // Insert review into database
    $sql = "INSERT INTO reviews (user_name, place_name, category, rating, review) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssds", $user_name, $place_name, $category, $rating, $review);

    if ($stmt->execute()) {
        echo "<script>alert('Review Submitted Successfully!'); window.location='reviews.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
