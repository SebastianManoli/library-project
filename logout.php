<?php
    session_start();
    if (isset($_GET['confirm']) && $_GET['confirm'] === 'true') {
        session_destroy();
        header('location: login.php');
        exit;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <p class='echo'>Are you sure you want to logout?</p>
    <a class='confirmation' href="logout.php?confirm=true">Yes</a>
    <a class='confirmation' href="index.php">No</a>
</body>
</html>