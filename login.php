<?php

session_start();

    include("connection.php");
    include("functions.php");


    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(!empty($username) && !empty($password))
        {
            $query = "select * from users where username = '$username' limit 1";
            $result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
        }
        echo "<p class='error'>Wrong Username or Password</p>";
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="centerBox">
        <div id="box">
            <form class="loginForm" action="" method="post">
                <h3>Login</h3> 
                <div class="loginFields">
                    <div class="input-field">
                        <label for="username">Username: </label><br>
                        <input id="username" type="text" name="username"> </br></br>
                    </div>
        
                    <div class="input-field">
                        <label for="password">Password: </label><br>
                        <input id="password" type="password" name="password"> </br></br>
                    </div> 
                </div>
    
                <input class="button" id="button" type="submit" value="Login"> </br></br>
                <a class="link" href="register.php">Click to Register</a> </br></br>
            
            </form>
        </div>
    </div>
    <footer>Seb's Library LTD</footer>
</body>
</html>