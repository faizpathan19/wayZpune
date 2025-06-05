<?php
include 'db.php'; // Include DB connection file
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit a Review</title>
    <link rel="stylesheet" href="review1.css"> <!-- Link your CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> <!-- Icons -->
</head>
<body>

    <div class="container">
        <div class="review-form">
            <h2><i class="fas fa-star"></i> Share Your Pune Experience</h2>
            <p>Tell us about your favorite places in Pune! 🌆</p>

            <form action="submit_review.php" method="POST">
                <div class="input-group">
                    <input type="text" name="user_name" placeholder="Your Name" required>
                    <i class="fas fa-user"></i>
                </div>

                <div class="input-group">
                    <input type="text" name="place_name" placeholder="Place Name" required>
                    <i class="fas fa-map-marker-alt"></i>
                </div>

                <div class="input-group">
                    <select name="category" required>
                        <option value="" disabled selected>Select Category</option>
                        <option value="Restaurant">Restaurant</option>
                        <option value="Hotel">Hotel</option>
                        <option value="Hill Station">Hill Station</option>
                        <option value="Other">Other</option>
                    </select>
                    <i class="fas fa-list"></i>
                </div>

                <div class="input-group">
                    <input type="number" name="rating" min="1" max="5" placeholder="Rating (1-5)" required>
                    <i class="fas fa-star-half-alt"></i>
                </div>

                <div class="input-group">
                    <textarea name="review" placeholder="Write your review..." required></textarea>
                    <i class="fas fa-comment"></i>
                </div>

                <button type="submit">Submit Review <i class="fas fa-paper-plane"></i></button>
            </form>
        </div>
    </div>

</body>
</html>
