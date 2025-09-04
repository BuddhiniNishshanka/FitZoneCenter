<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fitzone_fitness_center";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die ("Connection failed: ". mysqli_connect_error());
    }

    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $category = mysqli_real_escape_string($conn, $_POST["category"]);
    $content = mysqli_real_escape_string($conn, $_POST["content"]);

    $image = $_FILES["image"]["name"];
    $image = mysqli_real_escape_string($conn, $image);

    $target = "uploads/" . basename($image);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target);

    $query = "INSERT INTO blog_posts (title, category, image, content) VALUES ('$title', '$category', '$image', '$content')";

    if (mysqli_query($conn, $query)) {
        echo "<script> alert ('Blog post created successfully!'); window.location.href='admin_create_blog.php'; </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
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

        <a class="btn" href="admin_dashboard.html"> Back to Dashboard</a>
        <a class="btn" href="blog.php"> View Blogs</a>

        <h2>Create B<span>log Post</span></h2>

        <form method="POST" enctype="multipart/form-data">
            <label>Title:</label> <br>
            <input type="text" name="title" required> <br><br>

            <label>Category:</label> <br>
            <select name="category">
                <option value="Workout Routine">Workout Routine</option>
                <option value="Success Story">Success Story</option>
            </select> <br><br>

            <label>image:</label> <br>
            <input type="file" name="image"> <br><br>

            <label>Content:</label> <br>
            <textarea name="content" rows="8" cols="40" required></textarea> <br><br>

            <button class="sub-btn" type="submit">Submit</button>
        </form>

    </body>
</html>