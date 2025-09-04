<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fitzone_fitness_center";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die ("Connection failed: ". mysqli_connect_error());
}

$search = "";

if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $query = "SELECT appointments.appointment_date AS date, users.username, class_schedule.class_type, class_schedule.time, class_schedule.instructor FROM appointments
        JOIN users ON appointments.user_id = users.id
        JOIN class_schedule ON appointments.class_id = class_schedule.id
        WHERE class_schedule.class_type LIKE '%$search%' OR class_schedule.instructor LIKE '%$search%' ORDER BY date ASC, class_schedule.time ASC";
} 
else {
    $query = "SELECT appointments.appointment_date AS date, users.username, class_schedule.class_type, class_schedule.time, class_schedule.instructor FROM appointments JOIN users ON appointments.user_id = users.id
        JOIN class_schedule ON appointments.class_id = class_schedule.id ORDER BY date ASC, class_schedule.time ASC"; 
}

$result = mysqli_query($conn, $query);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FitZone Fitness Center</title>
        <link rel="icon" type="image/x-icon" href="background/fitzone_icon.jpg">
        <link rel="stylesheet" href="admin_view_feedback.css">
    </head>
    <body>

        <h2>Customer <span>Appointments</span></h2>

        <form method="GET" action="">
            <input type="text" name="search" placeholder="Search by class or instructor" value="<?php echo htmlspecialchars($search); ?>">
            <input type="submit" value="Search">
        </form>

        <table>
            <tr>
                <th>Date</th>
                <th>Username</th>
                <th>Class Type</th>
                <th>Time</th>
                <th>Instructor</th>
            </tr>

            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <td>" . htmlspecialchars($row['date']) . "</td>
                        <td>" . htmlspecialchars($row['username']) . "</td>
                        <td>" . htmlspecialchars($row['class_type']) . "</td>
                        <td>" . htmlspecialchars($row['time']) . "</td>
                        <td>" . htmlspecialchars($row['instructor']) . "</td>
                    </tr>" ;
                }
            } else {
                echo "<tr><td colspan='5'>No appointments found. </td></tr>";
            }
            ?>

        </table>

    </body>
</html>

<?php 
mysqli_close($conn);
?>
