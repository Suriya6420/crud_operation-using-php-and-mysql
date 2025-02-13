<?php

$host = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "crud_db"; 

// Create a new mysqli connection
$conn = new mysqli($host, $username, $password, $database);

// Check if the connection was successful
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
}

// Uncomment for debugging, but remove it in production
// echo "Database connected successfully";

?>
