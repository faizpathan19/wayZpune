<?php
include 'db.php';

$sql = "SELECT * FROM reviews ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <link rel="stylesheet" href="stylesr.css"> 
</head>
<body>

    <div class="reviews-section">
        <h2>Reviews from Visitors</h2>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="review-card">
                <h3><?php echo $row['place_name']; ?> (<?php echo $row['category']; ?>)</h3>
                <p><strong>Rating:</strong> ⭐ <?php echo $row['rating']; ?>/5</p>
                <p><?php echo $row['review']; ?></p>
                <p class="review-author">- <?php echo $row['user_name']; ?> | <?php echo $row['created_at']; ?></p>
            </div>
        <?php } ?>
    </div>

</body>
</html>

<?php $conn->close(); ?>
