<?php

session_start();

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
    $loginUsername = $_POST['username'];
    $loginPassword = $_POST['password'];

    /*Match username & password*/ 
    $loginQuery = "SELECT * FROM users WHERE username = '$loginUsername' AND password = '$loginPassword'";
    $loginResult = mysqli_query($conn, $loginQuery);

    if (mysqli_num_rows($loginResult)>0) {

        //Fetch the user data
        $user = mysqli_fetch_assoc($loginResult);
        $role = $user['role'];

        //Store user info
        $_SESSION['username'] = $loginUsername;
        $_SESSION['role'] = $role;

        if ($role == 'admin') {
            header("Location: admin_dashboard.html");
        } 
        else if ($role == 'staff') {
            header("Location: staff_dashboard.php");
        }
        else {
            header("Location: customer_dashboard.php");
        }
        exit();

    } else {
        echo "<script> alert ('Invalid username or password!'); window.location.href = 'login.html'; </script>";
    }
}
mysqli_close($conn);
?>

