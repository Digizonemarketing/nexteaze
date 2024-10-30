<?php
// Assuming session has started earlier in your script
// Check if the user is logged in
if (isset($_SESSION['name']) && isset($_SESSION['email'])) {
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];

    // Get initials for the profile icon
    $nameParts = explode(' ', $name);
    if (count($nameParts) > 1) {
        // If the name has more than one word, take the first letter of each word
        $initials = strtoupper(substr($nameParts[0], 0, 1) . substr($nameParts[1], 0, 1));
    } else {
        // If it's a single word, take the first two letters
        $initials = strtoupper(substr($nameParts[0], 0, 2));
    }
} else {
    // Default values if the user is not logged in
    $name = 'Guest';
    $email = 'guest@domain.com';
    $initials = 'GU'; // Default initials for guest
}
?>
<div class="rbt-left-panel popup-dashboardleft-section">
    <div class="rbt-default-sidebar">
        <div class="inner">
            <div class="content-item-content">
                <div class="rbt-default-sidebar-wrapper">
                    <nav class="mainmenu-nav">
                        <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                            <li><a href="dashboard.php"><i class="feather-home"></i><span>Dashboard</span></a></li>
                            <li><a href="manage-subscription.php"><i class="feather-credit-card"></i><span>Manage
                                        Subscription</span></a></li>
                        </ul>
                        <div class="rbt-sm-separator"></div>
                        <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                            <li><a href="generate-codes.php"><i class="feather-hash"></i><span>Generate Codes</span></a>
                            </li>
                            <li><a href="view-codes.php"><i class="feather-list"></i><span>View All Codes</span></a>
                            </li>
                            <li><a href="verify-codes.php"><i class="feather-check-circle"></i><span>Test
                                        Codes</span></a></li>
                            <li><a href="frontend-settings.php"><i class="feather-layout"></i><span>FrontEnd
                                        Settings</span></a></li>
                            <li><a href="help.php"><i class="feather-help-circle"></i><span>Help & FAQ</span></a></li>
                            <li><a href="blogs.php"><i class="feather-file-text"></i><span>Blogs</span></a></li>
                            <li><a href="manage-posts.php"><i class="feather-edit"></i><span>Manage Post</span></a></li>
                            <li><a href="create-post.php"><i class="feather-plus-square"></i><span>Create
                                        Post</span></a></li>
<li><a href="verification-script-generator.php"><i class="feather-code"></i><span>Verification Script Generator</span></a></li>

                        </ul>
                    </nav>


                </div>
            </div>
        </div>
        <?php
        // Assuming session has started earlier in your script
        // Check if the user is logged in
        if (isset($_SESSION['name']) && isset($_SESSION['email'])) {
            $name = $_SESSION['name'];
            $email = $_SESSION['email'];

            // Get initials for the profile icon
            $nameParts = explode(' ', $name);
            if (count($nameParts) > 1) {
                // If the name has more than one word, take the first letter of each word
                $initials = strtoupper(substr($nameParts[0], 0, 1) . substr($nameParts[1], 0, 1));
            } else {
                // If it's a single word, take the first two letters
                $initials = strtoupper(substr($nameParts[0], 0, 2));
            }
        } else {
            // Default values if the user is not logged in
            $name = 'Guest';
            $email = 'guest@domain.com';
            $initials = 'GU'; // Default initials for guest
        }
        ?>

        <div class="subscription-box">
            <div class="inner">
                <a href="profile-details.php" class="autor-info">
                    <div class="author-img active">
                        <!-- Show initials as a placeholder for the image -->
                        <div class="initials-placeholder" style="
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 50px;
                    height: 50px;
                    background: linear-gradient(90deg, #12B5DE -30%, #7130C3 30%, #FF3BD4 90%);
                    color: white;
                    font-size: 18px;
                    border-radius: 50%;
                ">
                            <?php echo $initials; ?>
                        </div>
                    </div>
                    <div class="author-desc">
                        <h6>
                            <?php echo $name; ?>
                        </h6>
                        <p style="font-size: 11px;">
                            <?php echo $email; ?>
                        </p>
                    </div>
                    <div class="author-badge">Free</div>
                </a>
                <!-- Optional: Button to upgrade to Pro -->
                <!-- <div class="btn-part">
            <a href="pricing.php" class="btn-default btn-border">Upgrade to Pro</a>
        </div> -->
            </div>
        </div>

        <!-- Footer of the subscription box -->
        <p class="subscription-copyright copyright-text text-center b4 small-text">© 2024 <a
                href="https://nexteaze.com">Nexteaze</a>.</p>

    </div>
</div>
<?php include 'script.php' ?>