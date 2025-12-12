<?php
$host = "fdb1032.awardspace.net";   // your MySQL host from InfinityFree
$db   = "4717467_bloodbank"; // your database name
$user = "4717467_bloodbank";       // your database username
$pass = "gT2Z5hLF7pm";   // your InfinityFree account password

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
