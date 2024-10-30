<?php $isLoggedIn = isset($_SESSION['name']) && isset($_SESSION['email']);
 ?>

<header class="rbt-dashboard-header rainbow-header header-default header-left-align rbt-fluid-header">
    <div class="container-fluid position-relative">
        <div class="row align-items-center">
            <div class="col-lg-2 col-md-6 col-7">
                <div class="header-left d-flex">
                    <div class="expand-btn-grp">
                        <button class="bg-solid-primary popup-dashboardleft-btn"><i class="feather-sidebar left"></i></button>
                    </div>
                    <div class="logo">
                        <a href="dashboard.php">
                            <img class="logo-light" src="public/images/logo/NextEase.svg" alt="Corporate Logo">
                            <img class="logo-dark" src="public/images/logo/NextEase.svg" alt="Corporate Logo">
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-10 col-md-6 col-5">
                <div class="header-right">
                    <h6 class="subtitle "><span id="currentdatetime" class="time theme-gradient"></span></h6>

                    <!-- Theme Switcher Button -->
                    <button id="theme-toggle-button">
                        <i data-feather="sun" class="feather feather-sun"></i>
                        <i data-feather="moon" class="feather feather-moon"></i>
                    </button>




                    <div class="header-btn d-none d-md-block">
                        <a class="btn-default btn-small round" target="_blank" href="plans-billing.php">Upgrade <i class="feather-zap"></i></a>
                    </div>

                    <!-- Start Mobile-Menu-Bar -->
                    <!-- <div class="mobile-menu-bar mr--10 ml--10 d-block d-lg-none">
                        <div class="hamberger">
                            <button class="hamberger-button">
                                <i class="feather-menu"></i>
                            </button>
                        </div>
                    </div> -->
                    <!-- Start Mobile-Menu-Bar -->

                    <!-- Start admin Area -->
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
                    <?php if ($isLoggedIn): ?>
                        <div class="account-access rbt-user-wrapper right-align-dropdown">
                            <div class="rbt-user ml--0">
                                <a class="admin-img" href="#">
                                    <div class="author-img active">
                                        <!-- Show initials as a placeholder for the image -->
                                        <div class="initials-placeholder" style="
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 40px;
                    height: 40px;
                    background: linear-gradient(90deg, #12B5DE -30%, #7130C3 30%, #FF3BD4 90%);
                    color: white;
                    font-size: 16px;
                    border-radius: 50%;
                ">
                                            <?php echo $initials; ?>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="rbt-user-menu-list-wrapper">
                                <div class="inner">
                                    <div class="rbt-admin-profile">
                                        <div class="admin-thumbnail">
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
                                        <div class="admin-info">
                                            <span class="name"><?php echo htmlspecialchars($_SESSION['name']); ?></span>
                                            <a class="rbt-btn-link color-primary" href="profile-details.php">View Profile</a>
                                        </div>
                                    </div>
                                    <ul class="user-list-wrapper user-nav">
                                        <li>
                                            <a href="profile-details.php">
                                                <i class="feather-user"></i>
                                                <span>Profile Details</span>
                                            </a>
                                        </li>


                                        <li>
                                            <a href="appearance.php">
                                                <i class="feather-home"></i>
                                                <span>Appearance</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="plans-billing.php">
                                                <i class="feather-briefcase"></i>
                                                <span>Plans and Billing</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="sessions.php">
                                                <i class="feather-users"></i>
                                                <span>Sessions</span>
                                            </a>
                                        </li>

                                    </ul>
                                    <hr class="mt--10 mb--10">
                                    <ul class="user-list-wrapper user-nav">
                                        <li>
                                            <a href="#">
                                                <i class="feather-help-circle"></i>
                                                <span>Help Center</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="profile-details.php">
                                                <i class="feather-settings"></i>
                                                <span>Settings</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <hr class="mt--10 mb--10">
                                    <ul class="user-list-wrapper">
                                        <li>
                                            <a href="logout.php">
                                                <i class="feather-log-out"></i>
                                                <span>Logout</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- End admin Area -->

                    <div class="expand-btn-grp <?php echo (isset($visibility) ? $visibility  : 'd-none') ?> ">
                        <button class="bg-solid-primary popup-dashboardright-btn"><i class="feather-sidebar right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>