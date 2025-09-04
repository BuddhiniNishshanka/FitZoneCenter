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

if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id']; 

    /*Prevent delete admind and staff */
    $checkRoleQuery = "SELECT role FROM users WHERE id = '$selectedId";
    $checkRoleResult = mysqli_query($conn, $checkRoleQuery);
    $roleRow = mysqli_fetch_assoc($checkRoleResult);

    if ($roleRow['role'] === 'customer') {
        $deleteQuery = "DELETE FROM users WHERE id = '$deleteId'";
        if (mysqli_query($conn, $deleteQuery)) {
            echo "<script> alert ('User deleted successfully!'); window.location.hfer='members.php';</script>";
        } else {
            "<script> alert ('Error deleting user!');</script>";
        }
    } else {
        echo "<script> alert ('only customers can be deleted!'); </script>";
    }
}
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
?>


<!DOCTYPE html>
<html>
    <head>
    `   <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FitZone Fitness Center</title>
        <link rel="icon" type="image/x-icon" href="background/fitzone_icon.jpg">

        <style>

            *{
                margin: 0px;
                padding: 0px;
                color: #fff;
            }

            body{
                font-family: Arial;
                padding: 20px;
                background: url(background/membership.jpg) no-repeat center fixed;
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

            .back-btn{
                display: inline-block;
                border: 1px solid #FFF200;
                border-radius: 2rem;
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                font-size: 18px;
                color: aqua;
            }

            .back-btn:hover{
                background-color: aqua;
                color: black;
            }

            h2{
                text-align: center;
                font-family: Century;
                font-size: 55px;
                color: #FFF200;
            }

            span{
                color: aqua;
            }

            table{
                margin-left: auto;
                margin-right: auto;
                width: auto;
                border-collapse: collapse;
                background: rgba(0, 0, 0, 0.6);
                border-color: aqua;
                margin-top: 30px;
                
            }

            th, td{
                padding: 10px;
                border: 2px solid #fff;
                border-color: aqua;
            }

            th{
                color: #FFF200;
            }

            .delete-btn{
                padding: 5px 10px;
                text-decoration: none;
                cursor: pointer;
                background-color: red;
                border: none;
                border-radius: 5px;
            }
        </style>
    </head>

    <body>
        <a class="back-btn" href="staff_dashboard.php"> Back to Dashboard </a>
        <h2>All <span>Registered</span> Users</h2>

        <table>
            <tr>
                <th>Id</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Gender</th>
                <th>Role</th>
                <th></th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td> <?php echo htmlspecialchars($row['id']); ?> </td>
                    <td> <?php echo htmlspecialchars($row['username']); ?> </td>
                    <td> <?php echo htmlspecialchars($row['email']); ?> </td>
                    <td> <?php echo htmlspecialchars($row['phone_number']); ?> </td>
                    <td> <?php echo htmlspecialchars($row['gender']); ?> </td>
                    <td> <?php echo htmlspecialchars($row['role']); ?> </td>
                    <td>
                        <?php if($row['role'] === 'customer') { ?>
                            <a class="delete-btn" href="members.php?delete_id=<?php echo $row['id']; ?>" onclick="return confirm ('Are you sure you want to delete this user?');">Delete</a>
                            <?php
                        } elseif ($row['role'] === 'admin') { ?>
                            <span style="color: gray;"> Admin </span> 
                            <?php } elseif ($row ['role'] === 'staff') { ?>
                                <span style="color: gray;"> Staff </span>
                            <?php } ?>
                    </td>
                </tr>
            <?php 
            } ?>
        </table>
    </body>
</html>