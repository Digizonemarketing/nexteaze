<!DOCTYPE html>
<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: signin.php"); // Redirect to login page
    exit();
}

$title = 'Generate Codes';

// Database connection details
$servername = "localhost"; // Change this to your database server
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "nexteaze"; // Change this to your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the logged-in user's email from the session
$user = $_SESSION['email'];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prefix = $_POST['prefix'];
    $postfix = $_POST['postfix'];
    $length = intval($_POST['length']);
    $quantity = intval($_POST['quantity']);
    $codeType = $_POST['codeType']; // Retrieve code type from form

    function generateCode($prefix, $length, $postfix, $codeType)
    {
        $chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = $prefix;

        switch ($codeType) {
            case 'alphanumeric':
                for ($i = 0; $i < $length; $i++) {
                    $code .= $chars[rand(0, strlen($chars) - 1)];
                }
                break;

            case 'numeric':
                $numericChars = '0123456789';
                for ($i = 0; $i < $length; $i++) {
                    $code .= $numericChars[rand(0, strlen($numericChars) - 1)];
                }
                break;

            case 'date-based':
                $datePart = date('Ymd'); // Format as YYYYMMDD
                $randomPart = substr(str_shuffle($chars), 0, $length - strlen($datePart));
                $code = $prefix . $datePart . $randomPart . $postfix;
                break;

            case 'sequential':
                static $counter = 1;
                $code .= str_pad($counter++, $length, '0', STR_PAD_LEFT);
                break;

            case 'randomized':
                $randomPart = substr(str_shuffle($chars), 0, $length);
                $code .= $randomPart;
                break;

            case 'prefix-suffix':
                $randomPart = substr(str_shuffle($chars), 0, $length);
                $code .= $randomPart . $postfix;
                break;

            case 'custom-pattern':
                // Example pattern: prefix-####-suffix
                $pattern = str_replace(['#'], [rand(0, 9)], str_repeat('#', $length));
                $code .= $pattern . $postfix;
                break;

            case 'hash-based':
                $randomString = substr(str_shuffle($chars), 0, $length);
                $code .= hash('sha256', $randomString) . $postfix;
                break;

            case 'qr-code-compatible':
                // QR code data usually doesn't have special formatting; use alphanumeric or custom pattern
                $randomPart = substr(str_shuffle($chars), 0, $length);
                $code .= $randomPart . $postfix;
                break;

            case 'barcode-compatible':
                // Simple numeric barcode format
                $randomPart = str_pad(rand(0, pow(10, $length) - 1), $length, '0', STR_PAD_LEFT);
                $code .= $randomPart . $postfix;
                break;

            case 'checksum':
                $randomPart = substr(str_shuffle($chars), 0, $length - 1);
                $checksum = array_sum(str_split($randomPart)) % 10;
                $code .= $randomPart . $checksum . $postfix;
                break;

            case 'user-defined':
                // Placeholder for user-defined format
                $randomPart = substr(str_shuffle($chars), 0, $length);
                $code .= $randomPart . $postfix;
                break;

            case 'geo-location':
                // Placeholder for geo-location format
                $randomPart = substr(str_shuffle($chars), 0, $length);
                $code .= $randomPart . $postfix;
                break;

            case 'time-based':
                $timePart = date('His'); // Format as HHMMSS
                $randomPart = substr(str_shuffle($chars), 0, $length - strlen($timePart));
                $code = $prefix . $timePart . $randomPart . $postfix;
                break;

            case 'category-based':
                // Example: Add a category identifier
                $category = 'CAT';
                $randomPart = substr(str_shuffle($chars), 0, $length - strlen($category));
                $code = $prefix . $category . $randomPart . $postfix;
                break;

            case 'product-code':
                // Example product code format
                $randomPart = substr(str_shuffle($chars), 0, $length);
                $code = $prefix . $randomPart . $postfix;
                break;

            case 'event-based':
                // Example: Add an event identifier
                $eventId = 'EVT';
                $randomPart = substr(str_shuffle($chars), 0, $length - strlen($eventId));
                $code = $prefix . $eventId . $randomPart . $postfix;
                break;

            case 'secure':
                $randomPart = substr(str_shuffle($chars), 0, $length);
                $code = base64_encode($prefix . $randomPart . $postfix);
                break;

            case 'versioned':
                $version = 'V1.0';
                $randomPart = substr(str_shuffle($chars), 0, $length - strlen($version));
                $code = $prefix . $randomPart . '-' . $version . $postfix;
                break;

            case 'hierarchical':
                // Example: Add hierarchical structure
                $hierarchy = 'LEVEL1';
                $randomPart = substr(str_shuffle($chars), 0, $length - strlen($hierarchy));
                $code = $prefix . $hierarchy . $randomPart . $postfix;
                break;

            case 'localized':
                // Example: Add a locale identifier
                $locale = 'US';
                $randomPart = substr(str_shuffle($chars), 0, $length - strlen($locale));
                $code = $prefix . $locale . $randomPart . $postfix;
                break;

            default:
                $randomPart = substr(str_shuffle($chars), 0, $length);
                $code .= $randomPart . $postfix;
                break;
        }

        return $code;
    }

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO verifi_codes (code, prefix, postfix, length, quantity, status, generated_by, code_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $status = 'no';
    $stmt->bind_param("sssiisss", $code, $prefix, $postfix, $length, $quantity, $status, $user, $codeType);

    $_SESSION['generated_codes'] = []; // Clear previous codes

    // Generate and store the codes
    for ($i = 0; $i < $quantity; $i++) {
        $code = generateCode($prefix, $length, $postfix, $codeType);
        $stmt->execute();
        $_SESSION['generated_codes'][] = $code; // Store generated code in session
    }

    $stmt->close();
    $conn->close();

    // Redirect to the same page to reset the form
    header("Location: test.php"); // Corrected redirect URL
    exit;
}

// Fetch all codes created by the logged-in user
$codesQuery = $conn->prepare("SELECT id, code, created_at, prefix, postfix, length, quantity, status, generated_by, code_type FROM verifi_codes WHERE generated_by = ?");
$codesQuery->bind_param("s", $user);
$codesQuery->execute();
$result = $codesQuery->get_result();
$codes = [];
while ($row = $result->fetch_assoc()) {
    $codes[] = $row;
}
$codesQuery->close();
$conn->close();
?>


<html lang="en">

<?php include '../common/admin-head.php' ?>

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
                            <div class="section-title text-center sal-animate" data-sal="slide-up">
                                <h2 class="title w-600 mb--20">Generate Product Verification Codes</h2>
                                <p class="description b1">Create unique verification codes for your products.</p>
                            </div>
                            <div class="container mt-4">
                                <!-- Display Generated Codes -->
                                <div class="border-gradient generated-codes rainbow-pricing style-chatenai active">

                                    <form method="post" action="/Nexteaze/test" class="row g-3 align-items-center new-chat-form" id="generate-codes-form">
                                        <div class="col-md-2">
                                            <label for="prefix" class="form-label">Code Prefix</label>
                                            <input type="text" class="form-control border-gradient" id="prefix" name="prefix" placeholder="Prefix" required>
                                        </div>
                                        <div class="col-md-2">
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
                                        <div class="col-md-2">
                                            <label for="codeType" class="form-label">Code Type</label>
                                            <select class="form-control form-select" id="codeType" name="codeType" required>
                                                <option value="">Select Code Type</option>
                                                <option value="alphanumeric">Alphanumeric Codes</option>
                                                <option value="numeric">Numeric Codes</option>
                                                <option value="date-based">Date-Based Codes</option>
                                                <option value="sequential">Sequential Codes</option>
                                                <option value="randomized">Randomized Codes</option>
                                                <option value="prefix-suffix">Prefix-Suffix Codes</option>
                                                <option value="custom-pattern">Custom Pattern Codes</option>
                                                <option value="hash-based">Hash-Based Codes</option>
                                                <option value="qr-code-compatible">QR Code-Compatible Codes</option>
                                                <!-- Additional Code Types -->
                                                <option value="barcode-compatible">Bar Code-Compatible Codes</option>
                                                <option value="checksum">Checksum Codes</option>
                                                <option value="user-defined">User-Defined Format Codes</option>
                                                <option value="geo-location">Geo-Location Codes</option>
                                                <option value="time-based">Time-Based Codes</option>
                                                <option value="category-based">Category-Based Codes</option>
                                                <option value="product-code">Product Code Formats</option>
                                                <option value="event-based">Event-Based Codes</option>
                                                <option value="secure">Secure Codes</option>
                                                <option value="versioned">Versioned Codes</option>
                                                <option value="hierarchical">Hierarchical Codes</option>
                                                <option value="localized">Localized Codes</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2 d-flex align-items-center">
                                            <button type="submit" class="btn-default btn-small round w-100">Generate</button>
                                        </div>
                                        <!-- Progress Bar -->
                                        <div class="progress mt-3">
                                            <div id="progress-bar" class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="rbt-main-content mr--0">
                <div class="rbt-daynamic-page-content">
                    <div class="rbt-dashboard-content">
                        <div class="content-page">
                            <div class="container mt-4">
                                <!-- Display Generated Codes -->
                                <div class="border-gradient generated-codes rainbow-pricing style-chatenai active">
                                    <h3>Generated Codes</h3>
                                    <?php if (!empty($codes)) : ?>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Code</th>
                                                    <!-- <th>Created At</th> -->
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
                                                        <!-- <td><?php echo htmlspecialchars($code['created_at']); ?></td> -->
                                                        <td><?php echo htmlspecialchars($code['prefix']); ?></td>
                                                        <td><?php echo htmlspecialchars($code['postfix']); ?></td>
                                                        <td><?php echo htmlspecialchars($code['length']); ?></td>

                                                        <td>
                                                            <?php if ($code['status'] === 'yes') : ?>
                                                                <i class="bi bi-check-circle text-success"></i>
                                                            <?php else : ?>
                                                                <i class="bi bi-x-circle text-danger"></i>
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

    </main>

</body>

</html>