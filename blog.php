<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fitzone_fitness_center";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die ("Connection failed: ". mysqli_connect_error());
}

$query = "SELECT * FROM blog_posts ORDER BY date_posted DESC";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FitZone Fitness Center</title>
        <link rel="icon" type="image/x-icon" href="background/fitzone_icon.jpg">
        <link rel="stylesheet" href="blog.css">
    </head>
    <body>
    
        <h2>Our <span>Blog</span></h2>

        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="blog-card">

                <?php if (!empty($row['image'])): ?>
                    <img src="uploads/<?=htmlspecialchars($row['image']) ?>" alt="Blog Image">
                <?php endif; ?>

                <div class="content">

                    <h3> <?= htmlspecialchars($row['title']) ?> <small>(<?= htmlspecialchars($row['category']) ?>)</small></h3>
                    <p><?= nl2br(htmlspecialchars($row['content'])) ?></p>
                    <p><em>Posted on <?= htmlspecialchars($row['date_posted']) ?></em></p>

                </div>

            </div>

        <?php endwhile; ?>

    <?php mysqli_close($conn); ?>

    </body>
</html>