<?php
session_start(); // Start the session
$session_timeout_duration = 100; // 30 minutes

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: signin"); // Redirect to login page if not logged in
    exit();
}

?>