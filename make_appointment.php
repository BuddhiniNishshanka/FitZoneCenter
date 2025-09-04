<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fitzone_fitness_center";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die ("Connection failed: ". mysqli_connect_error());
}

$customer_username = $_SESSION['username'];
$class_id = $_GET['class_id'];

$query = "SELECT id FROM users WHERE username = '$customer_username'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['id'];
}

$query = "INSERT INTO appointments (class_id, user_id) VALUES ('$class_id', '$user_id')";

if (mysqli_query($conn, $query)) {
    echo "<script>alert('Appointment made successfully!'); window.location.href='customer_view_classes.php';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>