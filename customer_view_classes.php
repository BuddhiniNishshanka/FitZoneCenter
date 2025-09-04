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
    $query = "SELECT * FROM class_schedule WHERE class_type LIKE '%$search%' OR instructor LIKE '%$search%' ORDER BY date ASC, time ASC";
} 
else {
    $query = "SELECT * FROM class_schedule ORDER BY date ASC, time ASC"; 
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

        <a href="customer_dashboard.php">Back to Dashboard</a>

        <h2>Scheduled <span>Classes</span></h2>

        <form method="GET">
            <input type="text" name="search" placeholder="Search by class or instructor" value="<?php echo htmlspecialchars($search); ?>">
            <input type="submit" value="Search">
        </form>

        <table>
            <tr>
                <th>Class Type</th>
                <th>Date</th>
                <th>Time</th>
                <th>Instructor</th>
                <th>Action</th>
            </tr>

            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <td>" . htmlspecialchars($row['class_type']) . "</td>
                        <td>" . htmlspecialchars($row['date']) . "</td>
                        <td>" . htmlspecialchars($row['time']) . "</td>
                        <td>" . htmlspecialchars($row['instructor']) . "</td>
                        <td> <a class='appointment-btn' href='make_appointment.php?class_id=" . $row['id'] . "'>Make Appointment</a> </td>
                    </tr>" ;
                    }
                } else {
                    echo "<tr><td colspan='5'>No Classes found. </td></tr>";
                }
            ?>

        </table>
    </body>
</html>

<?php 
mysqli_close($conn);
?>
