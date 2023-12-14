<?php

function check_login($con)
{
	// Check if the user is logged in
	if(isset($_SESSION['user_id']))
	{
		// retrieve their user ID from the session
		$id = $_SESSION['user_id'];
		$query = "select * from users where user_id = '$id' limit 1";

		// Execute the query using the provided database connection
		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
    }
    //redirect to login
    header("Location: login.php");
    die();
}

//generating user id
function random_num($length)
{
														
	$text = "";
	if($length < 3)
	{
		$length = 3;
	}

	$len = rand(3,$length);

	//concatenate 3 random numbers between 0 and 9 to $text
	for ($i=0; $i < $len; $i++) 
	{ 
		$text .= rand(0,9);
	}

	return $text;
}