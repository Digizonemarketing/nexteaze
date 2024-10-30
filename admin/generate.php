<?php
// generate-codes.php
include 'db.php'; // Include the database connection file

$codes = []; // Initialize codes array

if (isset($_POST['submit'])) {
    $prefix = htmlspecialchars($_POST['pre']);
    $postfix = htmlspecialchars($_POST['post']);
    $length = (int)$_POST['leng'];
    $quantity = (int)$_POST['quant'];

    for ($i = 0; $i < $quantity; $i++) {
        $code = generateCode($prefix, $postfix, $length);
        storeCodeInDatabase($code, $prefix, $postfix, $length);
    }

    // Retrieve all codes to display
    $codes = retrieveCodes();
}

// Function to generate a unique verification code
function generateCode($prefix, $postfix, $length) {
    // Generate random string
    $uniqueString = bin2hex(random_bytes($length - strlen($prefix) - strlen($postfix)));
    return $prefix . $uniqueString . $postfix;
}

// Function to store the code in the database
function storeCodeInDatabase($code, $prefix, $postfix, $length) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO verification_code (code, prefix, postfix, length) VALUES (?, ?, ?, ?)");
    $stmt->execute([$code, $prefix, $postfix, $length]);
}

// Function to retrieve codes from the database
function retrieveCodes() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM verification_code");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
