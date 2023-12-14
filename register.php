<?php
session_start();
include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $firstName = $_POST['firstName'];
    $surname = $_POST['surname'];
    $addressLine1 = $_POST['addressLine1'];
    $addressLine2 = $_POST['addressLine2'];
    $city = $_POST['city'];
    $telephone = $_POST['telephone'];
    $mobile = $_POST['mobile'];

    if (!empty($password) && !empty($confirm_password)) 
    {
        if ($password != $confirm_password) 
        {
            echo "<p class='error'>Passwords Do Not Match</p>";
        }
        elseif (strlen($password) < 6) 
        {
            echo "<p class='error'>Password should be at least 6 characters long</p>";
        }
        else 
        {
            // Passwords match and length is valid, proceed with user registration
            if (
                !empty($username) && !empty($firstName) &&
                !empty($surname) && !empty($addressLine1) &&
                !empty($addressLine2) && !empty($city) &&
                !empty($telephone) && !empty($mobile)
            ) {
                $user_id = random_num(3);
                $query = "INSERT INTO users (user_id, username, password, firstName, surname, addressLine1, addressLine2, city, telephone, mobile) 
                          VALUES ('$user_id', '$username', '$password', '$firstName', '$surname', '$addressLine1', '$addressLine2', '$city', '$telephone', '$mobile')";
                mysqli_query($con, $query);
                header("Location: login.php");
                die;
            } 
            else 
            {
                echo "<p class='error'>Invalid Information</p>";
            }
        }
    } else {
        echo "<p class='error'>Please enter both password and confirm password</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="centerBox">
        <div id="box">
            <h3>Library Register</h3> 
            <form action="" method="post">
                <div class="fields">
                    <div class="input-field">
                        <label for="username">Username: </label><br>
                        <input id="username" type="text" name="username"> </br></br>
                    </div>
    
                    <div class="input-field">
                        <label for="password">Password: </label><br>
                        <input id="password" type="password" name="password"> </br></br>
                    </div>
    
                    <div class="input-field">
                        <label for="confirm_password">Confirm Password: </label><br>
                        <input id="confirm_password" type="password" name="confirm_password"> </br></br>
                    </div>
    
                    <div class="input-field">
                        <label for="firstName">First Name: </label><br>
                        <input id="firstName" type="text" name="firstName"> </br></br>
                    </div>
    
                    <div class="input-field">
                        <label for="surname">Surname: </label><br>
                        <input id="surname" type="text" name="surname"> </br></br>
                    </div>
    
                    <div class="input-field">
                        <label for="addressLine1">Address Line 1: </label><br>
                        <input id="addressLine1" type="text" name="addressLine1"> </br></br>
                    </div>
    
                    <div class="input-field">
                        <label for="addressLine2">Address Line 2: </label><br>
                        <input id="addressLine2" type="text" name="addressLine2"> </br></br>
                    </div>
    
                    <div class="input-field">
                        <label for="city">City: </label><br>
                        <input id="city" type="text" name="city"> </br></br>
                    </div>
    
                    <div class="input-field">
                        <label for="telephone">Telephone: </label><br>
                        <input id="telephone" type="text" name="telephone"> </br></br>
                    </div>
    
                    <div class="input-field">
                        <label for="mobile">Mobile: </label><br>
                        <input id="mobile" type="text" name="mobile"> </br></br>
                    </div>
                    
                </div>
                
                <input class="button" id="button" type="submit" value="Register"> </br></br>
                <a class="link" href="login.php">Click to Login</a> </br></br>
    
    
    
            </form>
        </div>
    </div>
    <footer>Seb's Library LTD</footer>
</body>
</html>