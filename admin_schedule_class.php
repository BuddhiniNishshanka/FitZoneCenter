<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fitzone_fitness_center";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die ("Connection failed: ". mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $class_type = $_POST['class_type'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $instructor = $_POST['instructor'];

    $query = "INSERT INTO class_schedule(class_type, date, time, instructor) VALUES ('$class_type', '$date', '$time', '$instructor')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Class scheduled successfully!'); window.location.href='admin_schedule_class.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
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
        <link rel="icon" type="image/x-icon" href="background/fitzone_icon.jpg">

        <style>
            *{
                margin: 0px;
                padding: 0px;
                color: aqua;
            }

            body{
                font-family: Arial;
                padding: 20px;
                background: url(background/query.jpg) no-repeat center fixed;
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

            a{
                display: inline-block;
                border: 1px solid #FFF200;
                border-radius: 2rem;
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                font-size: 18px;
            }

            a:hover{
                background-color: aqua;
                color: black;
            }

            h2{
                margin-bottom: 5px;
                text-align: center;
                font-family: Century;
                font-size: 45px;
                color: #FFF200;
            }

            span{
                color: aqua;
            }

            form{
                background: rgba(0, 0, 0, 0.6);
                backdrop-filter: blur(2px);
                padding: 15px 25px;
                width: 350px;
                margin: auto;
                border-radius: 12px;
            }

            input{
                color-scheme: dark;
            }

            input[type="date"], input[type="time"], input[type="text"], select {
                background-color: transparent;
                color: #fff;
                border: 2px solid #FFF200;
                border-radius: 10px;
                padding: 8px;
                width: 300px;
                margin-top: 5px;
            }

            select option{
                background-color: black;
            }

            label{
                font-weight: bold;
            }

            .sub-btn{
                border: 1px solid #FFF200;
                color: #fff;
                background: transparent;
                border-radius: 2rem;
                padding: 10px 20px;
                margin-top: 12px;
                display: block;
                text-align: center;
                text-decoration: none;
                font-size: 16px;
            }

            .sub-btn:hover{
                background-color: aqua;
                color: black;
                
            }
        </style>
    </head>
    <body>
        <a href="admin_dashboard.html">Back to Dashboard</a>
        <a href="view_scheduled_classes.php">View Scheduled Classes</a>
        <h2>Schedule a <span>New Class</span> </h2>
        <form action="" method="POST">
            <label>Class Type:</label> <br>
            <select name="class_type" required>
                <option>Yoga</option>
                <option>Weight Gain</option>
                <option>Strength Training</option>
                <option>Fat Loss</option>
                <option>Weightlifting</option>
                <option>Running</option>
            </select> <br><br>
            <label>Date:</label> <br> <input type="date" name="date" required><br><br>
            <label>Time:</label> <br> <input type="time" name="time" required><br><br>
            <label>Instructor:</label> <br> <input type="text" name="instructor" required><br><br>
            <button class="sub-btn" type="submit">Schedule Class</button>
        </form>
    </body>
</html>

