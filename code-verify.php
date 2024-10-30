<?php
// Database connection setup
$servername = "localhost";
$username = "u884733952_nexteaze";
$password = "M5K^5@qQ";
$dbname = "u884733952_nexteaze";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$response = array();
$message = '';
$modalClass = '';

// Handle form submission via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['code'])) {
    $code = $conn->real_escape_string(trim($_POST['code'])); // Sanitize input

    // Prepare and execute statement to verify the code
    $stmt = $conn->prepare("SELECT code, status FROM verification_codes WHERE code = ?");
    $stmt->bind_param("s", $code);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();

        if ($data['status'] === 'yes') {
            $message = 'Oops! This code has already been used. Please check and try again.';
            $modalClass = 'alert-warning';
        } else {
            // Update status to Used
            $update_stmt = $conn->prepare("UPDATE verification_codes SET status = 'yes' WHERE code = ?");
            $update_stmt->bind_param("s", $code);
            $update_stmt->execute();

            if ($update_stmt->affected_rows === 0) {
                $message = 'Failed to update code status. Please try again later.';
                $modalClass = 'alert-danger';
            } else {
                $message = 'Great news! Your product has been successfully verified.';
                $modalClass = 'alert-success';
            }
            $update_stmt->close();
        }
    } else {
        $message = 'Sorry, the code you entered is invalid. Please try again.';
        $modalClass = 'alert-danger';
    }

    $stmt->close();
    $conn->close();
}
// Allow iframe embedding from any origin (less secure)
header('X-Frame-Options: ALLOWALL');

// Alternatively, restrict to a specific domain (more secure)
header('Content-Security-Policy: frame-ancestors https://yourshopifystore.com');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Verification - [Brand Name]</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/frontend.css">
    
    <!-- Google Fonts for Typography -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Custom CSS -->

</head>
<body>

<div class="container">
    <div class="verification-section" id="section-to-embed">
        <div class="left-side">
            <!-- Brand Hero Image or Gradient Background here -->
        </div>
        <div class="right-side">
            <img src="https://nexteaze.digizonesolutions.com/public/images/logo/NextEase.svg" alt="Brand Logo" class="brand-logo"> <!-- Replace with your brand's logo -->
            <h2>Verify Your Product</h2>
            <p class="tagline">Ensure your product is authentic and registered with our brand.</p>

            <form action="" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" id="code" name="code" placeholder="Enter your verification code" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-custom">Verify Now</button>
                </div>
            </form>

            <!-- Alerts/Modals for Feedback -->
            <?php if (!empty($message)): ?>
            <div class="alert <?= $modalClass ?> alert-custom mt-4">
                <?= $message ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Bootstrap JS and Dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
