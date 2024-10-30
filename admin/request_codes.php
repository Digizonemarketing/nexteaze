<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nexteaze";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prefix = $_POST['prefix'];
    $postfix = $_POST['postfix'];
    $length = $_POST['length'];
    $structureType = $_POST['structure'];
    $quantity = $_POST['quantity'];

    // Insert request into the code_requests table
    $sql = "INSERT INTO code_requests (prefix, postfix, code_length, structure_type, quantity, status)
            VALUES (?, ?, ?, ?, ?, 'pending')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiii", $prefix, $postfix, $length, $structureType, $quantity);

    if ($stmt->execute()) {
        echo "Request submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Request Product Codes</title>
</head>
<body>
    <h2>Request Code Generation</h2>
    <form method="post" action="">
        <label for="prefix">Prefix:</label>
        <input type="text" id="prefix" name="prefix"><br><br>

        <label for="postfix">Postfix:</label>
        <input type="text" id="postfix" name="postfix"><br><br>

        <label for="length">Code Length:</label>
        <input type="number" id="length" name="length" min="5" max="15" required><br><br>

        <label for="structure">Select Structure Type:</label>
        <select id="structure" name="structure">
            <option value="1">Prefix + Alphanumeric + Postfix</option>
            <option value="2">Numeric + Postfix</option>
            <option value="3">Prefix + Letters + Postfix</option>
            <option value="4">Uppercase Letters + Numbers</option>
            <option value="5">Prefix + Alphanumeric + Uppercase</option>
        </select><br><br>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" min="1" required><br><br>

        <input type="submit" value="Submit Request">
    </form>
</body>
</html>
