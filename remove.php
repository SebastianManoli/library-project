<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li>
                    <a href="index.php">Home</a>
                    <a href="search.php">Search</a>
                    <a href="view.php">Reservations</a>
                    <a href="logout.php">Logout</a>
                </li>
            </ul>
        </nav>
    </header>

    <footer>Seb's Library LTD</footer>
</body>
</html>
<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

if(isset($_POST['submit'])) {
    $id = $con->real_escape_string($_GET['ISBN']);
    $sql = "UPDATE books SET Reservation = 'N' WHERE ISBN = '$id'";
    $con->query($sql);

    $n = $user_data['username'];
    $d = date("Y-m-d");

    $sql2 = "DELETE FROM reservations WHERE ISBN = '$id'";
    $con->query($sql2);

    echo "<p class ='echo'>Reservation Removed</p>";
    echo "<a href='index.php' class ='confirmation'>Return Home</a>";
    return;
}

$id = $con->real_escape_string($_GET['ISBN']);
$sql = "SELECT * FROM books WHERE ISBN = '$id'";
$result = $con->query($sql);
$row = $result->fetch_assoc();
$n = htmlentities($row["BookTitle"]);
$a = htmlentities($row["Author"]);
$id = htmlentities($row["ISBN"]);

echo "<form method='post'>";
echo "<input type='hidden' name='id' value='$id'>";
echo "<p class='echo'>Are you sure you want to remove the reservation for '$n' by '$a'</p>";
echo "<input class='confirmation' type='submit' name='submit' value='Yes'>";
echo "<a class='confirmation' href='view.php'>No</a>";
echo "</form>";
?>
