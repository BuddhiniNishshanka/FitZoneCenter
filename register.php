<?php

/*Database Connect*/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fitzone_fitness_center";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die ("Connection failed: ". mysqli_connect_error());
}

/*Error Handling*/ 
if (isset($_POST['username']) && isset($_POST['password'])) {
    $regUsername = $_POST['username'];
    $regPassword = $_POST['password'];
    $regconfirmPassword = $_POST['confirm_password'];
    $regEmail = $_POST['email'];
    $regPhone_number = $_POST['phone_number'];
    $Gender = $_POST['gender'];
    $role = 'customer';

    /*Assigned usernames for Admin*/
    $adminUsernames = ['Buddhini', 'Chathushka'];
    if (in_array($regUsername, $adminUsernames)){
        $role = 'admin';
    }

    /*Assigned usernames for Staff*/
    $staffUsernames = ['Tarja', 'Infaz', 'Nawfer'];
    if (in_array($regUsername, $staffUsernames)){
        $role = 'staff';
    }

    /*Check username already exists*/ 
    $checkQuery = "SELECT * FROM users WHERE username = '$regUsername'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "<script> alert ('Username already exists!'); window.location.href = 'register.html'; </script>";
    } else {
        /*Insert new user*/
        $insertQuery = "INSERT INTO users (username, password, email, phone_number, gender, role) VALUES ('$regUsername', '$regPassword', '$regEmail', '$regPhone_number', '$Gender', '$role')";
        $insertResult = mysqli_query($conn, $insertQuery);

        if ($insertResult) {
            echo "<script> alert ('Registration successful!'); window.location.href = 'login.html'; </script>";
        } else {
            echo "<script> alert ('Error: " .  mysqli_error($conn) . "'); window.location.href = 'register.html'; </script>";
        }
    }
}

mysqli_close($conn);
?>

