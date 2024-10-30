<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'sec.php';

if (!isset($_SESSION['email'])) {
    die("User is not logged in.");
}

$logged_in_user = $_SESSION['email']; // Assuming 'email' is stored in the session after login
$logged_user = $_SESSION['name']; // Assuming 'email' is stored in the session after login

include '../common/db.php'; // Database connection

// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$title = 'View All Codes';
$user = $logged_in_user;

// Handle filters
$prefix_filter = isset($_GET['prefix']) ? $_GET['prefix'] : '';
$postfix_filter = isset($_GET['postfix']) ? $_GET['postfix'] : '';
$status_filter = isset($_GET['status']) ? $_GET['status'] : '';
$code_filter = isset($_GET['code']) ? $_GET['code'] : '';

// Build query with filters
$sql = "SELECT id, code, prefix, postfix, length, status, generated_by FROM verification_codes WHERE generated_by = ?";

// Add conditions for filters
$conditions = [$user];
$types = "s"; // For user (string type)

if ($prefix_filter) {
    $sql .= " AND prefix LIKE ?";
    $prefix_filter = "%$prefix_filter%";
    $conditions[] = $prefix_filter;
    $types .= "s";
}

if ($postfix_filter) {
    $sql .= " AND postfix LIKE ?";
    $postfix_filter = "%$postfix_filter%";
    $conditions[] = $postfix_filter;
    $types .= "s";
}

if ($status_filter) {
    $sql .= " AND status = ?";
    $conditions[] = $status_filter;
    $types .= "s";
}

if ($code_filter) {
    $sql .= " AND code LIKE ?";
    $code_filter = "%$code_filter%";
    $conditions[] = $code_filter;
    $types .= "s";
}

// Prepare the statement
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

// Bind parameters
if (!$stmt->bind_param($types, ...$conditions)) {
    die("Binding parameters failed: " . $stmt->error);
}

// Execute the statement
if (!$stmt->execute()) {
    die("Execute failed: " . $stmt->error);
}

// Get result
$result = $stmt->get_result();
$codes = [];

// Fetch the results
while ($row = $result->fetch_assoc()) {
    $codes[] = $row;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>

<html lang="en">
<?php include '../common/head.php'; ?>

<body>
    <main class="page-wrapper rbt-dashboard-page">
        <div class="rbt-panel-wrapper">
            <!-- Include common header, menu, etc. -->
            <?php include '../common/header.php'; ?>
            <?php include '../common/mobilemenu.php'; ?>
            <?php include '../common/Leftpanel.php'; ?>
            <div class="rbt-main-content mr--0">
                <div class="rbt-daynamic-page-content">
                    <div class="rbt-dashboard-content">
                        <div class="content-page">
                            <div class="container mt-4">
                                <h2>All Generated Codes</h2>
                                <!-- Filter Form -->
                                <form method="GET" action="" class="d-flex align-items-center gap-3 mb-4" id="filter-form">
                                    <!-- Code Prefix -->
                                    <div class="flex-grow-1">
                                        <input type="text" name="prefix" class="form-control form-control-lg" placeholder="Code Prefix" value="<?php echo htmlspecialchars($prefix_filter); ?>" style="max-width: 150px;">
                                    </div>
                                    <!-- Code Postfix -->
                                    <div class="flex-grow-1">
                                        <input type="text" name="postfix" class="form-control form-control-lg" placeholder="Code Postfix" value="<?php echo htmlspecialchars($postfix_filter); ?>" style="max-width: 150px;">
                                    </div>
                                    <!-- Status Filter -->
                                    <div class="flex-grow-1">
                                        <select name="status" class="form-control" style="max-width: 150px;">
                                            <option value="">Status</option>
                                            <option value="yes" <?php if ($status_filter === 'yes') echo 'selected'; ?>>Yes</option>
                                            <option value="no" <?php if ($status_filter === 'no') echo 'selected'; ?>>No</option>
                                        </select>
                                    </div>
                                    <!-- Code Filter -->
                                    <div class="flex-grow-1">
                                        <input type="text" name="code" class="form-control form-control-lg" placeholder="Code" value="<?php echo htmlspecialchars($code_filter); ?>" style="max-width: 200px;">
                                    </div>
                                    <!-- Submit Button -->
                                    <div>
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                    <!-- Download Button -->
                                    <div>
                                        <a href="download_codes.php?prefix=<?php echo urlencode($prefix_filter); ?>&postfix=<?php echo urlencode($postfix_filter); ?>&status=<?php echo urlencode($status_filter); ?>&code=<?php echo urlencode($code_filter); ?>" class="btn-default btn-small w-100">Download CSV</a>
                                    </div>
                                </form>

                                <!-- Display the filtered codes -->
                                <div class="border-gradient generated-codes mt-4">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Code</th>
                                                <th>Prefix</th>
                                                <th>Postfix</th>
                                                <th>Status</th>
                                                <th>Generated By</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($codes)) : ?>
                                                <?php foreach ($codes as $code) : ?>
                                                    <tr>
                                                        <td><?php echo htmlspecialchars($code['id']); ?></td>
                                                        <td><?php echo htmlspecialchars($code['code']); ?></td>
                                                        <td><?php echo htmlspecialchars($code['prefix']); ?></td>
                                                        <td><?php echo htmlspecialchars($code['postfix']); ?></td>
                                                        <td><?php echo htmlspecialchars($code['status']); ?></td>
                                                        
                                                        <td><?php echo htmlspecialchars($logged_user); ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="6">No codes found.</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
