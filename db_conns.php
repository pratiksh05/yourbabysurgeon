<?php
$servername = "localhost";
$username = "Subbarao123";
$password = "Subbarao123";
$database = "hanumanchalisa";

// Create connection
$db_connection = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$db_connection) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
?>