<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
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
    <h1>Your Reservations</h1>

    <footer>Seb's Library LTD</footer>
</body>
</html>
<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

$u = $user_data['username'];

$sql = "SELECT books.ISBN, BookTitle, Author, Reservation, ReserveDate
FROM books
JOIN reservations
ON books.ISBN = reservations.ISBN
WHERE UserName = '$u'";

$result = $con->query($sql);

if ($result->num_rows > 0) {
    echo "<table id='reserveTable' border='1'>";
    echo "<tr>";
    echo "<th>ISBN</th>";
    echo "<th>Book Title</th>";
    echo "<th>Author</th>";
    echo "<th>Reservation</th>";
    echo "<th>Reserve Date</th>";
    echo "</tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlentities($row["ISBN"]) . "</td>";
        echo "<td>" . htmlentities($row["BookTitle"]) . "</td>";
        echo "<td>" . htmlentities($row["Author"]) . "</td>";
        echo "<td>" . htmlentities($row["Reservation"]) . "</td>";
        echo "<td>" . htmlentities($row["ReserveDate"]) . "</td>";
        echo "<td>" . "<a href='remove.php?ISBN=".htmlentities($row["ISBN"])."'>Remove</a>" . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p class='echo'>You currently have no reservations.</p>";
}

?>