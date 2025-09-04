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

$currentusername = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username = '$currentusername' AND role = 'customer'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) === 1 ) {
    $customer = mysqli_fetch_assoc($result);
} else {
    echo "<script> alert('Customer not found.'); window.location.href = 'login.html';</script>";
    exit();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FitZone Fitness Center</title>
        <link rel="icon" type="image/x-icon" href="background/fitzone_icon.jpg">

        <style>
            *{
                margin: 0px;
                padding: 5px;
                color: aqua;
            }

            body{
                font-family: Arial;
                padding: 20px;
                background: url(background/admin-profile.jpg) no-repeat center fixed;
                background-size: 100% 100%;
                justify-content: center;
            }

            body::before{
                content: "";
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100vh;  
                background: rgba(0, 0, 0, 0.4);
                backdrop-filter: blur(2px);
                z-index: -1; /*Keep overlay behind all the content*/
            }

            h2{
                padding-top: 18px;
                text-align: center;
                font-family: Century;
                font-size: 45px;
                color: #FFF200;
            }

            span{
                color: aqua;
            }

            .profile-box{
                background: rgba(0, 0, 0, 0.6);
                padding: 27px;
                width: 400px;
                margin: auto;
                border-radius: 12px;
            }

            .profile-box .field{
                margin-bottom: 10px;
            }

            .profile-box label{
                display: block;
                font-weight: bold;
                margin-bottom: 5px;
            }

            .profile-box .field-value{
                background-color: transparent;
                color: #fff;
                border: 2px solid #FFF200;
                border-radius: 10px;
                padding: 10px;
                width: 100%;
                font-size: 16px;
            }

            .back-btn{
                display: inline-block;
                border: 1px solid #FFF200;
                border-radius: 2rem;
                padding: 10px 20px;
                margin-top: 20px;
                text-align: center;
                text-decoration: none;
                font-size: 18px;
            }

            .back-btn:hover{
                background-color: aqua;
                color: black;
            }

            .query-res-btn{
                display: inline-block;
                border: 1px solid #FFF200;
                border-radius: 2rem;
                padding: 10px 20px;
                margin-top: 20px;
                text-align: center;
                text-decoration: none;
                font-size: 18px;
            }

            .query-res-btn:hover{
                background-color: aqua;
                color: black;
            }

        </style>

        </head>
    <body>
        <h2>My <span>Profile</span></h2>
        
        <div class="profile-box">
            <div class="field">
                <label for="username">Username:</label>
                <input type="text" id="username" class="field-value" value="<?php echo $customer['username']; ?>" readonly>
            </div>

            <div class="field">
                <label for="email">Email:</label>
                <input type="text" id="email" class="field-value" value="<?php echo $customer['email']; ?>" readonly>
            </div>

            <div class="field">
                <label for="phone_number">Phone Number:</label>
                <input type="text" id="phone_number" class="field-value" value="<?php echo $customer['phone_number']; ?>" readonly>
            </div>

            <div class="field">
                <label for="gender">Gender:</label>
                <input type="text" id="gender" class="field-value" value="<?php echo $customer['gender']; ?>" readonly>
            </div>

            <div class="field">
                <label for="role">Role:</label>
                <input type="text" id="role" class="field-value" value="<?php echo $customer['role']; ?>" readonly>
            </div>

            <div>
                <a class="back-btn" href="customer_dashboard.php"> Back to Dashboard </a>
                <a class="query-res-btn" href="customer_query_responses.php"> Query Responses </a>
            </div>

        </div>
    </body>
</html>
