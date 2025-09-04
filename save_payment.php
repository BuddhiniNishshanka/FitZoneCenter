<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fitzone_fitness_center";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die ("Connection failed: ". mysqli_connect_error());
}

$fullName = $_POST['fullName'];
$email = $_POST['email'];
$membershipType = $_POST['membershipType'];
$bank = $_POST['bank'];
$cardNumber = $_POST['cardNumber'];
$expiry = $_POST['expiry'];
$cvv = $_POST['cvv'];

$query = "INSERT INTO payments (fullName, email, membership_type, bank, card_number, expiry_date, cvv) 
    VALUES ('$fullName', '$email', '$membershipType', '$bank', '$cardNumber', '$expiry', '$cvv') ";

if (mysqli_query($conn, $query)) {
    echo "<script> alert('Payment Successful!'); window.location.href='home.html'; </script>";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
