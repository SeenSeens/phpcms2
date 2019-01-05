<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "phpcms2";

// Create connection
$Connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($Connection->connect_error) {
    die("Connection failed: " . $Connection->connect_error);
} 
// echo "Connected successfully";
?>