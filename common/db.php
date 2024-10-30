<?php
$servername = "localhost"; // Change this to your database server
$username = "u884733952_nexteaze";        // Change this to your database username
$password = "M5K^5@qQ";            // Change this to your database password
$dbname = "u884733952_nexteaze"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
