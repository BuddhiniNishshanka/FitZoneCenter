<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fitzone_fitness_center";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die ("Connection failed: ". mysqli_connect_error());
}

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $emai = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $query = "INSERT INTO feedback (name, email, subject, message) VALUE ('$name', '$emai', '$subject', '$message')";

    if (mysqli_query($conn, $query)) {
        echo "<script> alert('Thank you! Your message has been sent!'); window.location.href='contact_us.html';</script>";
    } else {
        echo "<script> alert('Error: " . mysqli_error($conn) . "'); window.location.href='contact_us.html';</script>";
    }
}

mysqli_close($conn);
?>