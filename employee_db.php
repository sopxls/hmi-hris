<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "employee_db";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
} else {
   // echo "✅ Database connected successfully!<br>";
}
?>
