<!DOCTYPE html>
<?php

include '../common/db.php';


// Check if form data is set
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
    // Get form data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Validate passwords
    if ($password !== $confirm_password) {
        die("Passwords do not match.");
    }

    // Hash password with MD5
    $hashed_password = md5($password);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $hashed_password);

    // Execute the query
    if ($stmt->execute()) {
        // Redirect to signin.php
        header("Location: signin");
        exit();
    } else {
        $error = "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>



<html lang="en">

<?php $title = 'SignUp' ?>
<?php include '/common/admin-head.php' ?>

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
                        <img src="public/images/logo/boxed-logo.png" alt="sign-up logo">
                    </div>
                    <div class="separator-animated animated-true"></div>
                    <div class="signup-box-bottom">
                        <div class="signup-box-content">
                            <h4 class="title">Welcome Back!</h4>
                            <div class="social-btn-grp">
                                <a class="btn-default btn-border" href="#">
                                    <span class="icon-left"><img src="public/images/sign-up/google.png" alt="Google Icon"></span>Login with Google
                                </a>
                                <a class="btn-default btn-border" href="#">
                                    <span class="icon-left"><img src="public/images/sign-up/facebook.png" alt="Google Icon"></span>Login with Facebook
                                </a>
                            </div>
                            <div class="text-social-area">
                                <hr>
                                <span>Or continue with</span>
                                <hr>
                            </div>
                            <?php if (!empty($error)): ?>
                                <p class="error"><?php echo htmlspecialchars($error); ?></p>
                            <?php endif; ?>

                            

                            <form action="/Nexteaze/signup" method="POST">
                                <div class="input-section mail-section">
                                    <div class="icon"><i class="feather-user"></i></div>
                                    <input type="text" name="name" placeholder="Enter Your Name" required>
                                </div>
                                <div class="input-section mail-section">
                                    <div class="icon"><i class="feather-mail"></i></div>
                                    <input type="email" name="email" placeholder="Enter email address" required>
                                </div>
                                <div class="input-section password-section">
                                    <div class="icon"><i class="feather-lock"></i></div>
                                    <input type="password" name="password" id="password" placeholder="Create Password" required>
                                </div>
                                <div class="input-section password-section">
                                    <div class="icon"><i class="feather-lock"></i></div>
                                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
                                </div>
                                <button type="submit" class="btn-default">Sign Up</button>
                            </form>
                        </div>
                        <div class="signup-box-footer">
                            <div class="bottom-text">
                                If you have an account <a class="btn-read-more" href="signin.php"><span>Sign In</span></a>
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


</body>

</html>