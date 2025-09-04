<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fitzone_fitness_center";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die ("Connection failed: ". mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = !empty($_POST['phone']) ? "'" . mysqli_real_escape_string($conn, $_POST['phone']) . "'" : "NULL";
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $query = "INSERT INTO queries (name, email, phone, subject, category, message, date_submitted) VALUES ('$name', '$email', $phone, '$subject', '$category', '$message', NOW())";

    if (mysqli_query($conn, $query)) {
        echo "<script> alert ('Query has been submitted successfully!'); window.location.href='customer_dashboard.php'; </script>";
    } else {
        echo "<script> alert ('Error: " . mysqli_error($conn) . "'); window.location.href='customer_query.php'; </script>";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FitZone Fitness Center</title>
        <link rel="stylesheet" href="customer_query.css">
        <link rel="icon" type="image/x-icon" href="background/fitzone_icon.jpg">
    </head>
    <body>

        <a class="back-btn" href="customer_dashboard.php#about"> Back to Dashboard </a>

        <h2>Submit a <span>Query</span> </h2>

        <form action="customer_query.php" method="POST">

            <label for="name"> Full Name: </label><br>
            <input  type="text" name="name" id="name" required> <br><br>

            <label for="email"> Email Address: </label><br>
            <input  type="email" name="email" id="email" required> <br><br>
            
            <label for="phone"> Phone Number (optional): </label><br>
            <input  type="text" name="phone" id="phone"> <br><br>
            
            <label for="subject"> Subject: </label><br>
            <input  type="text" name="subject" id="subject" required> <br><br>

            <label for="category"> Category: </label><br>
            <select name="category" id="category">
                <option value="General">General</option>
                <option value="Membership">Membership</option>
                <option value="Classes">Classes</option>
                <option value="Trainers">Trainers</option>
            </select> <br><br>
            
            <label for="message"> Your Message: </label><br>
            <textarea name="message" id="message" rows="5" cols="40" required></textarea> <br><br>
            
            <button class="sub-btn" type="submit">Submit</button>
        </form>
    
    </body>
</html>