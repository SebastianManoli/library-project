<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
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

    <h1>Search Books</h1>
    <div class="search">
    <?php
    session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);

    if(isset($_GET['title']) || isset($_GET['author']) || isset($_GET['category'])) {
        $title = $_GET['title'];
        $author = $_GET['author'];
        $category = $_GET['category'];

        // Title Search
        if($title != "") {
            $t = $con->real_escape_string($title);

            $sqlSearch1 = "SELECT * FROM books WHERE BookTitle LIKE '%$t%'";
            $result1 = $con->query($sqlSearch1);

            if ($result1->num_rows > 0) {
                echo "<table id='searchTable' border='1'>";
                echo "<tr>";
                echo "<th>ISBN</th>";
                echo "<th>Book Title</th>";
                echo "<th>Author</th>";
                echo "<th>Category</th>";
                echo "<th>Edition</th>";
                echo "<th>Year</th>";
                echo "<th>Reservation</th>";
                echo "</tr>";
                while($row = $result1->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlentities($row["ISBN"]) . "</td>";
                    echo "<td>" . htmlentities($row["BookTitle"]) . "</td>";
                    echo "<td>" . htmlentities($row["Author"]) . "</td>";
                    echo "<td>" . htmlentities($row["CategoryID"]) . "</td>";
                    echo "<td>" . htmlentities($row["Edition"]) . "</td>";
                    echo "<td>" . htmlentities($row["Year"]) . "</td>";
                    echo "<td>";
                    // If the book is not reserved, display the reserve button
                    if(htmlentities($row["Reservation"]) == 'N') 
                    {
                        echo ('<a href="reservations.php?ISBN='.htmlentities($row["ISBN"]).'">Reserve</a>');
                    } else {
                        echo "Reserved";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p class='echo'>0 Results</p>";
            }
        }

        // Author Search
        if($author != "") {
            $a = $con->real_escape_string($author);

            $sqlSearch2 = "SELECT * FROM books WHERE Author LIKE '%$a%'";
            $result2 = $con->query($sqlSearch2);

            if ($result2->num_rows > 0) {
                echo "<table id='searchTable' border='1'>";
                echo "<tr>";
                echo "<th>ISBN</th>";
                echo "<th>Book Title</th>";
                echo "<th>Author</th>";
                echo "<th>Category</th>";
                echo "<th>Edition</th>";
                echo "<th>Year</th>";
                echo "<th>Reservation</th>";
                echo "</tr>";
                while($row = $result2->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlentities($row["ISBN"]) . "</td>";
                    echo "<td>" . htmlentities($row["BookTitle"]) . "</td>";
                    echo "<td>" . htmlentities($row["Author"]) . "</td>";
                    echo "<td>" . htmlentities($row["CategoryID"]) . "</td>";
                    echo "<td>" . htmlentities($row["Edition"]) . "</td>";
                    echo "<td>" . htmlentities($row["Year"]) . "</td>";
                    echo "<td>";
                    if(htmlentities($row["Reservation"]) == 'N') {
                        echo ('<a href="reservations.php?ISBN='.htmlentities($row["ISBN"]).'">Reserve</a>');
                    } else {
                        echo "Reserved";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p class='echo'>0 results</p>";
            }
        }

        // Category Search
        if($category != "") {
            $c = $con->real_escape_string($category);

            $sqlSearch3 = "SELECT * FROM books WHERE CategoryID = '$c'";
            $result3 = $con->query($sqlSearch3);

            if ($result3->num_rows > 0) {
                echo "<table id='searchTable' border='1'>";
                echo "<tr>";
                echo "<th>ISBN</th>";
                echo "<th>Book Title</th>";
                echo "<th>Author</th>";
                echo "<th>Category</th>";
                echo "<th>Edition</th>";
                echo "<th>Year</th>";
                echo "<th>Reservation</th>";
                echo "</tr>";
                while($row = $result3->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlentities($row["ISBN"]) . "</td>";
                    echo "<td>" . htmlentities($row["BookTitle"]) . "</td>";
                    echo "<td>" . htmlentities($row["Author"]) . "</td>";
                    echo "<td>" . htmlentities($row["CategoryID"]) . "</td>";
                    echo "<td>" . htmlentities($row["Edition"]) . "</td>";
                    echo "<td>" . htmlentities($row["Year"]) . "</td>";
                    echo "<td>";
                    if(htmlentities($row["Reservation"]) == 'N') {
                        echo ('<a href="reservations.php?ISBN='.htmlentities($row["ISBN"]).'">Reserve</a>');
                    } else {
                        echo "Reserved";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p class='echo'>0 results</p>";
            }
        }
    }
    ?>
    </div>
    <div id="searchBox">
        <form class="searchForm" action="" method="GET">
                <label for="title">Search by Book Title: </label><br>
                <input id="title" type="text" name="title"> </br></br>
                <label for="author">Search by Author: </label><br>
                <input id="author" type="text" name="author"> </br></br>
                <label for="category">Select Category: </label><br>
                <select id="category" name="category">
                <?php
                    $sqlSearch = "SELECT CategoryID, CategoryName FROM category";
                    $resultSearch = mysqli_query($con, $sqlSearch);
                    if ($resultSearch->num_rows > 0) {

                        echo "<option value=''>--Select a Category--</option>";
                        while($row = $resultSearch->fetch_assoc()) {
                            echo "<option value='" . htmlentities($row["CategoryID"]) . "'>" . htmlentities($row["CategoryName"]) . "</option>";
                        }
                    }

                ?>                
                </select>
                <input class="button" id="button" type="submit" value="Search"> </br></br>
        </form>
    </div>

    <footer>Seb's Library LTD</footer>
</body>
</html>