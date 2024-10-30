<?php  include 'sec.php' ?>

<?php



// Regenerate session ID for security
session_regenerate_id(true);

if ($_SERVER['REQUEST_URI'] === '/NextEaze/src/views/admin/dashboard') {
    // Redirect to /dashboard
    header("Location: /NextEaze/dashboard");
    exit(); // Ensure no further code is executed
}

$theme = include '../common/theme_switcher.php';

// Check if the theme has been switched and handle it
if (isset($_POST['theme'])) {
    $theme = $_POST['theme'] === 'white' ? 'white' : 'black';
    setcookie('theme', $theme, time() + (86400 * 30), "/");
    header("Location: " . $_SERVER['PHP_SELF']);
    // Redirect to the current page to apply the new theme
    exit(); // Ensure no further code is executed
}

$title = 'Dashboard';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../common/admin-head.php'; ?>
</head>
<body>
    <main class="page-wrapper rbt-dashboard-page">
        <div class="rbt-panel-wrapper">
            <?php include '../common/header.php'; ?>
            <?php include '../common/mobilemenu.php'; ?>
            <!-- <?php include '../common/preloader.php'; ?> -->
            <?php include '../common/Leftpanel.php'; ?>

            <!-- Main content -->
            <div class="rbt-main-content mr--0">
                <div class="rbt-daynamic-page-content">
                    <!-- Dashboard Center Content -->
                    <div class="rbt-dashboard-content">
                        <div class="banner-area">
                            <!-- ChatenAI small Slider -->
                            <div class="rainbow-slider-section slick-grid-15 rainbow-slick-dot sm-slider-carosel-activation">
                            </div>
                        </div>
                        <div class="content-page">
                            <div class="chat-box-list">
                                <div class="welcome-wrapper">
                                    <div class="content-section">
                                        <h4 class="title">👋 Welcome, <span class="theme-gradient"><?php echo htmlspecialchars($_SESSION['name']); ?></span></h4>
                                    </div>
                                

                                    <h6 class="subtitle "><span id="currentdatetime" class="theme-gradient"></span></h6>
                                    <div class="btn-section">
                                        <a class="btn-default bg-solid-primary" data-bs-toggle="modal" data-bs-target="#newchatModal">
                                            <span class="icon"><i class="feather-plus-circle"></i></span>
                                            <span>Upgrade Plan </span>
                                        </a>
                                    </div>
                                </div>

                                <div class="container mt-4">
                                    <div class="section-title text-center sal-animate" data-sal="slide-up" data-sal-duration="700" data-sal-delay="100">
                                        <h2 class="title w-600 mb--20">Simplifying Product Verification</h2>
                                        <p class="description b1">Effortlessly verify your products with <span class="theme-gradient">Nexteaze. </span> Empowering businesses with reliable product authentication.</p>
                                    </div>

                                    <div class="genarator-section">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-6 mb-4">
                                                    <a href="generate-codes.php" class="genarator-card">
                                                        <div class="inner d-flex flex-column justify-content-center align-items-center text-center">
                                                            <div class="icon-bar mb-2">
                                                                <i id="icon-c" class="bi bi-code" style="font-size: 2rem;"></i>
                                                            </div>
                                                            <h5 class="title">Code Generator</h5>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-3 col-md-6 mb-4">
                                                    <a href="verify-codes.php" class="genarator-card">
                                                        <div class="inner d-flex flex-column justify-content-center align-items-center text-center">
                                                            <div class="icon-bar mb-2">
                                                                <i id="icon-c" class="bi bi-check-square icon-c" style="font-size: 2rem;"></i>
                                                            </div>
                                                            <h5 class="title">Code Verification</h5>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-3 col-md-6 mb-4">
                                                    <a href="view-codes.php" class="genarator-card">
                                                        <div class="inner d-flex flex-column justify-content-center align-items-center text-center">
                                                            <div class="icon-bar mb-2">
                                                                <i id="icon-c" class="bi bi-sliders icon-c" style="font-size: 2rem;"></i>
                                                            </div>
                                                            <h5 class="title">Code Management</h5>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-3 col-md-6 mb-4">
                                                    <a href="Reports-Analytics.php" class="genarator-card">
                                                        <div class="inner d-flex flex-column justify-content-center align-items-center text-center">
                                                            <div class="icon-bar mb-2">
                                                                <i id="icon-c" class="bi bi-bar-chart icon-c" style="font-size: 2rem;"></i>
                                                            </div>
                                                            <h5 class="title">Reports & Analytics</h5>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Includes -->
        <?php include '../common/newchatModal.php'; ?>
        <?php include '../common/likeModal.php'; ?>
        <?php include '../common/dislikeModal.php'; ?>
        <?php include '../common/shareModal.php'; ?>

    </main>

    <!-- Start script -->
    <?php include '../common/script.php'; ?>
    <!-- End script -->
</body>
</html>
