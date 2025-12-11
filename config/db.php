<?php
$host = "localhost:3307";  
$user = "root";       
$pass = "";           
$db   = "bloodbank_db";

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
