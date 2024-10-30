<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nexteaze";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$range = isset($_GET['range']) ? $_GET['range'] : 'daily';

// Fetch data based on the selected range
if ($range == 'daily') {
    $query = "SELECT DATE(created_at) AS date, COUNT(*) AS count FROM verification_codes WHERE generated_by = ? GROUP BY DATE(created_at)";
} elseif ($range == 'weekly') {
    $query = "SELECT YEARWEEK(created_at, 1) AS week, COUNT(*) AS count FROM verification_codes WHERE generated_by = ? GROUP BY YEARWEEK(created_at, 1)";
} elseif ($range == 'monthly') {
    $query = "SELECT DATE_FORMAT(created_at, '%Y-%m') AS month, COUNT(*) AS count FROM verification_codes WHERE generated_by = ? GROUP BY DATE_FORMAT(created_at, '%Y-%m')";
} else {
    echo json_encode(['labels' => [], 'values' => []]);
    exit();
}

$stmt = $conn->prepare($query);
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();

$labels = [];
$values = [];
while ($row = $result->fetch_assoc()) {
    $labels[] = $row['date'];
    $values[] = $row['count'];
}

$stmt->close();
$conn->close();

echo json_encode(['labels' => $labels, 'values' => $values]);
?>
