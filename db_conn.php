<?php

// Database connection
$userID = "localhost";
$username = "root";
$password = "";
$login = "login_db"; // Make sure the database is correct

$conn = mysqli_connect($userID, $username, $password, $login);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()); // More detailed error message
}

