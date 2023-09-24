<?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$database = "phpcms2";




try {
    // Create connection
    $Connection = new mysqli($servername, $username, $password, $database);
    // Check connection
    if ($Connection->connect_error) {
        throw new Exception("Connection failed: " . $Connection->connect_error);
    }
//    $Connection->close();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>