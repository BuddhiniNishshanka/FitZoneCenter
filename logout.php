<?php

if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    session_start();
    session_unset();
    session_destroy();
    echo "<script>alert('Logout successful!'); window.location.href = 'login.html'; </script>";
    exit();
}
?>

<script>
    if (confirm("Are you sure! You want to logout?")) {
        window.location.href = "logout.php?confirm=yes";
    } else {
        window.history.back();
    }
</script>


