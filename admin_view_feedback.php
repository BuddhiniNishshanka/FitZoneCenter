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

//Search
$searchTerm = "";
if (isset($_GET['search'])) {
    $searchTerm = mysqli_real_escape_string($conn, $_GET['search']);
    $query = "SELECT * FROM feedback WHERE name LIKE '%$searchTerm' OR email LIKE '%$searchTerm' OR subject LIKE '%$searchTerm' ORDER BY submitted_at DESC";
} else {
    $query = "SELECT * FROM feedback ORDER BY submitted_at DESC";
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

        <a href="admin_dashboard.html"> Back to Dashboard</a>

        <h2>Feed<span>back</span></h2>

        <form method="GET" action="">
            <input type="text" name="search" placeholder="Search by name, email or subject" value="<?php echo htmlspecialchars($searchTerm); ?>">
            <input type="submit" value="Search">
        </form>

        <?php if (mysqli_num_rows($result) > 0): ?>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Submitted Date</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['name']); ?> </td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['subject']); ?></td>
                    <td><?php echo htmlspecialchars($row['message']); ?></td>
                    <td><?php echo ($row['submitted_at']); ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
        <?php else: ?>
            <p>No queries found.</p>
        <?php endif; ?>
        
    </body>
</html>

<?php
mysqli_close($conn);
?>
