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

$customer_username = $_SESSION['username'];
$query = "SELECT * FROM queries WHERE email = (SELECT email FROM users WHERE username = '$customer_username') ORDER BY date_submitted DESC";
$result = mysqli_query($conn, $query);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FitZone Fitness Center</title>
        <link rel="stylesheet" href="admin_queries.css">
        <link rel="icon" type="image/x-icon" href="background/fitzone_icon.jpg">
    </head>

    <body>

        <a class="back-btn" href="customer_dashboard.php">Back to Dashboard</a>

        <h2>Queries and<span> Responses</span></h2>

        <?php if(mysqli_num_rows($result)>0): ?>
            <table>
                <tr>
                    <th>Subject</th>
                    <th>Category</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Admin's Reply</th>
                </tr>

                <?php while($row=mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td> <?php echo htmlspecialchars($row['subject']); ?> </td>
                        <td> <?php echo htmlspecialchars($row['category']); ?> </td>
                        <td> <?php echo htmlspecialchars($row['message']); ?> </td>
                        <td> <?php echo htmlspecialchars($row['status']); ?> </td>
                        <td> <?php echo htmlspecialchars($row['reply']); ?> </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>You have not submitted any queries yet.</p>
        <?php endif; ?>

    </body>
</html>