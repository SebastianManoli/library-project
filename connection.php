<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "book_db";

if (!$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname))
{
    die("connection failure");
}