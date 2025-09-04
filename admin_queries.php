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

$query = "SELECT * FROM queries ORDER BY date_submitted DESC";
$result = mysqli_query($conn, $query);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reply_id'])) {
    $reply_id = $_POST['reply_id'];
    $reply_message = mysqli_real_escape_string($conn, $_POST['reply_message']);

    $update_query = "UPDATE queries SET reply = '$reply_message', status = 'Replied' WHERE id = $reply_id";

    if (mysqli_query($conn, $update_query)) {
        echo "<script> alert('Reply sent successfully!'); window.location.href='admin_queries.php';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "'); </script>";
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
        <link rel="stylesheet" href="admin_queries.css">
    </head>
    <body>

        <h2>Customer <span>Queries</span></h2>

        <?php if (mysqli_num_rows($result) > 0): ?>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Subject</th>
                <th>Category</th>
                <th>Message</th>
                <th>Status</th>
                <th>Reply Message</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['name']); ?> </td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['phone']); ?></td>
                    <td><?php echo htmlspecialchars($row['subject']); ?></td>
                    <td><?php echo htmlspecialchars($row['category']); ?></td>
                    <td><?php echo htmlspecialchars($row['message']); ?></td>
                    <td><?php echo htmlspecialchars($row['status']); ?></td>

                    <td>
                        <?php if ($row['status'] === 'Pending'): ?>
                            <form action="admin_queries.php" method="POST">
                                <textarea name="reply_message" required></textarea> <br><br>
                                <button class="sub-btn" type="submit" name="reply_id" value="<?php echo $row['id']; ?>">Send</button>
                            </form>
                        <?php else: ?>
                            <p>Replied: <?php echo nl2br(htmlspecialchars($row['reply'])); ?> </p>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
        <?php else: ?>
            <p>No queries found.</p>
        <?php endif; ?>
        
    </body>
</html>