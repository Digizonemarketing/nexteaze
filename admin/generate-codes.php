<?php
include '../common/db.php';
include 'sec.php';

$logged_in_user = $_SESSION['email']; // Assuming email is stored in session

// Function to generate a unique verification code
function generateCode($prefix, $postfix, $length) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $randomString = substr(str_shuffle($characters), 0, $length);
    return $prefix . $randomString . $postfix;
}

// Handle form submission for code generation
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prefix = $_POST['prefix'];
    $postfix = $_POST['postfix'];
    $length = $_POST['length'];
    $quantity = $_POST['quantity'];

    for ($i = 0; $i < $quantity; $i++) {
        $code = generateCode($prefix, $postfix, $length);

        // Insert generated code into the database with the logged-in user's email
        $stmt = $conn->prepare("INSERT INTO verification_codes (code, prefix, postfix, length, generated_by) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssis", $code, $prefix, $postfix, $length, $logged_in_user);
        $stmt->execute();
    }

    $stmt->close();
}

// Fetch generated codes only by the logged-in user from the database
$sql = "SELECT * FROM verification_codes WHERE generated_by = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $logged_in_user);
$stmt->execute();
$result = $stmt->get_result();
$codes = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $codes[] = $row;
    }
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<?php include '../common/admin-head.php'; ?>
<body>

<main class="page-wrapper rbt-dashboard-page">
    <div class="rbt-panel-wrapper">
        <?php include '../common/header.php'; ?>
        <?php include '../common/mobilemenu.php'; ?>
        <?php include '../common/Leftpanel.php'; ?>

        <div class="rbt-main-content mr--0">
            <div class="rbt-daynamic-page-content">
                <div class="rbt-dashboard-content">
                    <div class="content-page">
                        <div class="container mt-4">
                            <div class="section-title text-center">
                                <h2 class="title w-600 mb--20">Generate Product Verification Codes</h2>
                                <p class="description b1">Create unique verification codes for your products.</p>
                            </div>

                            <div class="col-lg">
                                <div class="card shadow-sm rbt-static-bar">
                                    <form method="post" action="" class="row g-3 align-items-center new-chat-form border-gradient" id="generate-codes-form">
                                        <div class="col-md-3">
                                            <label for="prefix" class="form-label">Code Prefix</label>
                                            <input type="text" class="form-control border-gradient" id="prefix" name="prefix" placeholder="Prefix" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="postfix" class="form-label">Code Postfix</label>
                                            <input type="text" class="form-control border-gradient" id="postfix" name="postfix" placeholder="Postfix" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="length" class="form-label">Code Length</label>
                                            <input type="number" class="form-control border-gradient" id="length" name="length" min="1" max="11" placeholder="Length" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="quantity" class="form-label">Quantity</label>
                                            <input type="number" class="form-control border-gradient" id="quantity" name="quantity" min="1" placeholder="Quantity" required>
                                        </div>
                                        <div class="col-md-2 d-flex align-items-center">
                                            <button type="submit" class="btn-default btn-small round w-100">Generate</button>
                                        </div>
                                    </form>

                                    <!-- Progress Bar -->
                                    <div class="progress mt-3">
                                        <div id="progress-bar" class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                                    </div>
                                </div>
                            </div>

                          <!-- Display Generated Codes -->
<div class="container mt-4">
    <div class="border-gradient generated-codes rainbow-pricing style-chatenai active">
        <h3>Generated Codes</h3>
        <?php if (!empty($codes)) : ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Code</th>
                        <th>Prefix</th>
                        <th>Postfix</th>
                        <th>Length</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($codes as $code) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($code['id']); ?></td>
                            <td><?php echo htmlspecialchars($code['code']); ?></td>
                            <td><?php echo htmlspecialchars($code['prefix']); ?></td>
                            <td><?php echo htmlspecialchars($code['postfix']); ?></td>
                            <td><?php echo htmlspecialchars($code['length']); ?></td>
                            <td>
                                <?php if ($code['status'] === 'yes') : ?>
                                    <i class="fa-duotone fa-solid fa-check-double"><?php echo htmlspecialchars($code['status']); ?></i>
                                <?php else : ?>
                                   <i class="fa-solid fa-circle-xmark"><?php echo htmlspecialchars($code['status']); ?></i>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>No codes generated yet.</p>
        <?php endif; ?>
    </div>
</div>



                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
