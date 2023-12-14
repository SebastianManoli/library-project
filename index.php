<?php
session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
    <h1 class="home">Welcome, <i><?php echo $user_data['username'];?></i></h1>
    <div class="everything-index">
        <div class="card-container">
            <div class="card">
                <!-- <img src="/assignment/images/library-background.jpg" alt=""> -->
                <a href="index.php">
                    <div class="card--display">
                        <i class="material-icons">About</i>
                        <h2>Some Info About Us!</h2>
            </div>
            <div class="card--hover">
                <h2>Who Are We?</h2>
                <p>Welcome to Seb's Library, a haven for bibliophiles and seekers of wisdom! Nestled in the heart of knowledge, Seb's Library is more than a collection of books; it's a sanctuary where stories come alive, and curiosity knows no bounds.</p>
            </div>
        </a>
        <div class="card--border"></div>
            </div>
        </div>

        <div class="card-container">
            <div class="card">
                <a href="search.php">
                <div class="card--display">
                    <i class="material-icons">Search</i>
                    <h2>Search For a Book!</h2>
                </div>
                <div class="card--hover">
                    <h2>Looking for a Book?</h2>
                    <p> Unleash the power of your curiosity and quench your thirst for knowledge by searching for your next favorite book within our shelves. The knowledge you seek is just a search away.</p>
                    <p class="link">Click to search for a book & make a reservation</p>
                </div>
                </a>
                <div class="card--border"></div>
            </div>
        </div>
      
      <div class="card-container">
        <div class="card">
          <a href="view.php">
            <div class="card--display">
              <i class="material-icons">Reserved</i>
              <h2>Check Your Reservations!</h2>
            </div>
            <div class="card--hover">
              <h2>Want to see your Reservations?</h2>
              <p>Our library's reservation system is your key to a seamless and personalized reading experience. Say goodbye to the uncertainty of book availability and long wait times.</p>
              <p class="link">Click to see Reservations</p>
            </div>
          </a>
          <div class="card--border"></div>
        </div>
      </div>

    </div>


    <footer>Seb's Library LTD</footer>
</body>
</html>