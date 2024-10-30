<?php  
include 'sec.php'; 

// Regenerate session ID for security
session_regenerate_id(true);

// Security function to sanitize domain input
function sanitize_domain($domain) {
    return filter_var(trim($domain), FILTER_SANITIZE_URL);
}

// Function to generate iframe embed code for a given domain
function generate_iframe_code($domain) {
    $sanitized_domain = sanitize_domain($domain);
    
    // Example of token generation (use a secret key in production)
    $token = hash('sha256', $sanitized_domain . 'secret-key');
    
    // Iframe embed code for the provided domain
    return "<iframe src='https://nexteaze.digizonesolutions.com/code-verify?token={$token}' 
            width='100%' height='500px' style='border:0;' allowfullscreen='true' 
            sandbox='allow-scripts allow-same-origin'></iframe>";
}

$domain = $iframe_code = $error = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['domain'])) {
        $domain = sanitize_domain($_POST['domain']);
        if (filter_var($domain, FILTER_VALIDATE_URL)) {
            $iframe_code = generate_iframe_code($domain);
        } else {
            $error = 'Invalid domain format. Please enter a valid domain name.';
        }
    } else {
        $error = 'Please enter a domain name.';
    }
}

$title = 'Embed Code Generator';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../common/admin-head.php'; ?>
    <script>
        // Function to copy embed code to clipboard
        function copyToClipboard(elementId) {
            const copyText = document.getElementById(elementId).textContent;
            const textArea = document.createElement("textarea");
            textArea.value = copyText;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand("Copy");
            document.body.removeChild(textArea);
            alert("Embed code copied to clipboard!");
        }
    </script>
</head>
<body>
    <main class="page-wrapper rbt-dashboard-page">
        <div class="rbt-panel-wrapper">
            <?php include '../common/header.php'; ?>
            <?php include '../common/mobilemenu.php'; ?>
            <?php include '../common/Leftpanel.php'; ?>

            <!-- Main content -->
            <div class="rbt-main-content mr--0">
                <div class="rbt-daynamic-page-content">
                    <div class="rbt-dashboard-content">
                        <div class="content-page">
                            <div class="container mt-4">
                                <div class="section-title text-center">
                                    <h2 class="title w-600 mb--20">Generate Your Embed Code</h2>
                                    <p class="description b1">Enter the domain where you wish to embed the code verification widget.</p>
                                </div>

                                <!-- Embed Code Form -->
                                <div class="embed-code-form">
                                    <form method="post" action="">
                                        <div class="mb-3">
                                            <label for="domain" class="form-label">Enter Domain Name:</label>
                                            <input type="text" class="form-control" id="domain" name="domain" value="<?php echo htmlspecialchars($domain, ENT_QUOTES, 'UTF-8'); ?>" required>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Generate Embed Code</button>
                                    </form>
                                </div>

                                <!-- Error Alert -->
                                <?php if ($error): ?>
                                    <div class="alert alert-danger mt-3"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
                                <?php endif; ?>

                                <!-- Iframe Embed Code Output -->
                                <?php if ($iframe_code): ?>
                                    <div class="embed-code-output mt-4">
                                        <h5>Your Iframe Embed Code:</h5>
                                        <pre><code id="embedCode"><?php echo htmlspecialchars($iframe_code, ENT_QUOTES, 'UTF-8'); ?></code></pre>
                                        <button class="btn btn-secondary" onclick="copyToClipboard('embedCode')">Copy Embed Code</button>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Start script -->
    <?php include '../common/script.php'; ?>
    <!-- End script -->
</body>
</html>
