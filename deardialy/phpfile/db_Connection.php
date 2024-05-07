<?php
$host = "localhost"; // Replace with your host name
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "dear_diary"; // Replace with your database name

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>