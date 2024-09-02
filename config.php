<?php
// config.php

// Database configuration
$host = 'localhost';
$user = 'root';
$password = 'Abc@1234';
$database = 'disaster_db';

// Create a connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

 echo 'Connected successfully';

// Close connection (when done with it)
// $conn->close();

