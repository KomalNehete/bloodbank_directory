<?php
$host = "sql113.infinityfree.com	
";   // your MySQL host from InfinityFree
$db   = "if0_40664898_bloodbank"; // your database name
$user = "if0_40664898";       // your database username
$pass = "Ibf4k2KnDiL";   // your InfinityFree account password

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
