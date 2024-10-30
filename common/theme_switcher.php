<?php
// Check if a theme change is requested
if (isset($_POST['theme'])) {
    $theme = $_POST['theme'] === 'white' ? 'white' : 'black';
    setcookie('theme', $theme, time() + (86400 * 30), "/"); // Set cookie for 30 days
    header("Location: " . $_SERVER['REQUEST_URI']); // Redirect to the current page
    exit(); // Ensure no further code is executed
}

// Get the current theme from the cookie or default to black
$theme = isset($_COOKIE['theme']) ? $_COOKIE['theme'] : 'black';
?>
