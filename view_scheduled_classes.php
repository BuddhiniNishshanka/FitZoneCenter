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
$query = "SELECT * FROM class_schedule ORDER BY date ASC, time ASC";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    $query = "SELECT * FROM class_schedule WHERE class_type LIKE '%$search%' OR date LIKE '%$search%' OR instructor LIKE '%$search%' ORDER BY date ASC, time ASC";
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
        <h2>Scheduled <span>Classes</span></h2>
        <form method="POST">
            <input type="text" name="search" placeholder="Search by class, date, time or instructor" value="<?php echo htmlspecialchars($search); ?>">
            <input type="submit" value="Search">
        </form>
        <table>
            <tr>
                <th>Class Type</th>
                <th>Date</th>
                <th>Time</th>
                <th>Instructor</th>
            </tr>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['class_type']) . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . date('h:i A', strtotime($row['time'])) . "</td>";
                    echo "<td>" . htmlspecialchars($row['instructor']) . "</td>";
                    echo "</tr>" ;
                    }
                } else {
                echo "<tr><td colspan='5'>No scheduled classes. </td></tr>";
            }
            ?>
        </table>
    </body>
</html>
<?php 
mysqli_close($conn);
?>


