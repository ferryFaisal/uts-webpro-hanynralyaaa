<?php
// used to connect to the database
$host = "localhost";
$username = "root";
$password = "";
$db_name = "webpro";

// Create connection
$conn = new mysqli($host, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
