<?php
session_start();

$session_timeout_duration = 1800; // 30 minutes

// Check for session timeout
if (isset($_SESSION['last_activity'])) {
    $session_age = time() - $_SESSION['last_activity'];
    
    if ($session_age > $session_timeout_duration) {
        session_unset(); // Unset session variables
        session_destroy(); // Destroy the session
        header("Location: /signin"); // Redirect to login page
        exit;
    }
}

// Update the last activity time
$_SESSION['last_activity'] = time();

// At this point, you can check for a 404 condition
// If the requested page does not exist, handle the 404 error
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI'])) {
    // Redirect to the previous page if available
    if (isset($_SERVER['HTTP_REFERER'])) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        // Fallback if no referer is available
        echo "<h1>404 Not Found</h1>";
        echo "<p>The page you were looking for could not be found.</p>";
        echo "<a href='/'>Go to Home</a>";
        exit;
    }
}
?>
