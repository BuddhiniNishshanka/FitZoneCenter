<?php
session_start();

if ($_SESSION['role'] !== 'staff') {
    header("Location: ;ogin.html");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FitZone Fitness Center</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" type="image/x-icon" href="background/fitzone_icon.jpg">
    </head>
    <body>
        <script src="script.js"></script>
        <header>
        <div class="logo">
            <img src="background/fitzone_logo.jpg" alt="fitzone_logo"> 
        </div>    
        <div class="main">
            <a href="#home" class="gymname"> FitZone <br><span> Fitness Center </span> <p>Kurunagala</p></a>
            <ul class="nav"> 
                
                <li><a href="staff_profile.php"> Staff Profile </a></li>
                <li><a href="view_scheduled_classes.php"> Classes</a></li>
                <li><a href="staff_members.php"> Members </a></li>
                <li><a href="view_appointments.php"> Appointments </a></li>
                <li><a href="admin_queries.php"> Queries  </a></li>
                <li><a href="logout.php"> Log out</a></li>
            </ul>
        </div>
        <h2 id="greetingMessage"></h2> 
        <div class="title">
            <h1> FitZone Fitness Center</h1>
        </div>
        </header>
    </body>
</html>



