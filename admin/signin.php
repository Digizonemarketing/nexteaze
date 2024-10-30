<?php
session_start();

// Database connection
include '../common/db.php';
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $hashed_password = md5($password);

    // Prepare and execute SQL query for user authentication
    $stmt = $conn->prepare("SELECT name FROM users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $hashed_password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch user data
        $user = $result->fetch_assoc();
        $name = $user['name'];

        // Start session and set session variables
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;

        // Get session details
        $browser = $_SERVER['HTTP_USER_AGENT'];
        $device = 'Unknown'; // You can enhance this based on user agent parsing
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $browser_icon = 'firefox.png'; // Set a default or use user agent parsing
        $sign_in_date = date('Y-m-d H:i:s');

        // Check if the session already exists
        $check_stmt = $conn->prepare("SELECT * FROM user_sessions WHERE email = ? AND ip_address = ? AND device = ?");
        $check_stmt->bind_param("sss", $email, $ip_address, $device);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();

        if ($check_result->num_rows === 0) {
            // No existing session, insert new session
            $insert_stmt = $conn->prepare("INSERT INTO user_sessions (email, browser, device, ip_address, browser_icon, sign_in_date) VALUES (?, ?, ?, ?, ?, ?)");
            $insert_stmt->bind_param("ssssss", $email, $browser, $device, $ip_address, $browser_icon, $sign_in_date);
            $insert_stmt->execute();
            $insert_stmt->close();
        } else {
            // Update the session's sign_in_date if it already exists
            $update_stmt = $conn->prepare("UPDATE user_sessions SET sign_in_date = ? WHERE email = ? AND ip_address = ? AND device = ?");
            $update_stmt->bind_param("ssss", $sign_in_date, $email, $ip_address, $device);
            $update_stmt->execute();
            $update_stmt->close();
        }

        // Debug output
        echo "Session variables set. Redirecting...";

        // Redirect to protected page
        header("Location: dashboard");
        exit();
    } else {
        $error = "Invalid email or password.";
    }

    // Close the authentication statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>




<html lang="en">

<?php $title = 'Log In' ?>
<?php include '../common/admin-head.php' ?>

<body>
    <main class="page-wrapper">

        <!-- Start Header Top Area  -->
        <div class="header-top-news bg-image1">
            <div class="wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="inner">
                                <div class="content">
                                    <span class="rainbow-badge">Limited Time Offer</span>
                                    <span class="news-text">Intro price. Get ChatenAI for Big Sale -95% off.</span>
                                </div>
                                <div class="right-button">
                                    <a class="btn-read-more" href="#">
                                        <span>Purchase Now <i class="feather-arrow-right"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="icon-close">
                <button class="close-button bgsection-activation">
                    <i class="feather-x"></i>
                </button>
            </div>
        </div>
        <!-- End Header Top Area  -->

        <!-- start header -->
        <!--  -->
        <!-- End  header -->

        <!-- start header -->
        <?php include '../common/header.php' ?>
        <!-- End  header -->

        <!-- start mobilemenu -->
        <?php include '../common/mobilemenu.php' ?>
        <!-- End  mobilemenu -->

        <!-- start Preloader -->
        <!-- <?php include '../common/preloader.php' ?> -->
        <!-- End Preloader -->

        <!-- Start Sign up Area  -->
        <div class="signup-area rainbow-section-gapTop-big" data-black-overlay="2">
            <div class="sign-up-wrapper rainbow-section-gap">
                <div class="sign-up-box bg-flashlight">
                    <div class="signup-box-top top-flashlight light-xl">
                        <img src="/public/images//logo/boxed-logo.jpg" alt="sign-up logo">
                    </div>
                    <div class="separator-animated animated-true"></div>
                    <div class="signup-box-bottom">
                        <div class="signup-box-content">
                            <h4 class="title">Welcome Back!</h4>
                            <?php if (!empty($error)): ?>
                                <p class="error"><?php echo htmlspecialchars($error); ?></p>
                            <?php endif; ?>
                            <form action="signin" method="POST">
                                <div class="input-section mail-section">
                                    <div class="icon"><i class="feather-mail"></i></div>
                                    <input type="email" name="email" placeholder="Enter email address" required>
                                </div>
                                <div class="input-section password-section">
                                    <div class="icon"><i class="feather-lock"></i></div>
                                    <input type="password" name="password" placeholder="Password" required>
                                </div>
                                <div class="forget-text"><a class="btn-read-more" href="#"><span>Forgot password</span></a></div>
                                <button type="submit" class="btn-default">Sign In</button>
                            </form>

                        </div>
                        <div class="signup-box-footer">
                            <div class="bottom-text">
                                Don't have an account? <a class="btn-read-more" href="signup.php"><span>Sign Up</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Sign up Area  -->

        <!-- Start Footer Area  -->
        <?php include '../common/footer.php' ?>
        <!-- End Footer Area  -->

        <!-- Start Copy Right Area  -->
        <?php include '../common/copyRight.php' ?>
        <!-- End Copy Right Area  -->

    </main>

    <!-- start script -->

    <!-- End  script -->

</body>

</html>