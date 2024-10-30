<!DOCTYPE html>
<html lang="en">

<?php $title = 'Settings' ?>
<?php include '../common/admin-head.php' ?>

<body>
    <main class="page-wrapper rbt-dashboard-page">
        <div class="rbt-panel-wrapper">

            <?php include '../common/header.php'; ?>
            <?php include '../common/mobilemenu.php'; ?>
            <?php include '../common/Leftpanel.php'; ?>

            <!-- Main content -->
            <div class="rbt-main-content mr--0 mb--0">
                <div class="rbt-daynamic-page-content center-width">

                    <!-- Dashboard Center Content -->
                    <div class="rbt-dashboard-content">
                        <div class="banner-area">
                            <?php include '../common/setting-bar.php'; ?>

                        </div>
                        <div class="content-page pb--50">
                            <div class="chat-box-list">
                                <!-- ChatenAI Apearance Select -->
                                <div class="single-settings-box top-flashlight light-xl leftside">
                                    <h4 class="title">Appearance</h4>
                                    <div class="switcher-btn-grp">
                                        <button class="dark-switcher active">
                                            <img src="assets/images/switcher-img/dark.png" alt="Switcher Image">
                                            <span class="text">Dark Mode</span>
                                        </button>
                                        <button class="light-switcher disabled" disabled>
                                            <img src="assets/images/switcher-img/light.png" alt="Switcher Image">
                                            <span class="text">Light Mode</span>
                                            <s class="rainbow-badge-card badge-sm position-top-right">Coming</s>
                                        </button>
                                    </div>
                                </div>

                                <!-- ChatenAI Language Select -->
                                <div class="single-settings-box top-flashlight light-xl leftside">
                                    <h4 class="title">Languages</h4>
                                    <div class="select-area">
                                        <h6 class="text">System Language</h6>

                                        <div class="rbt-modern-select bg-transparent height-45">
                                            <select>
                                                <option data-content="<img class='left-image' src='assets/images/icons/en-us.png' alt='Language Images'> English">English</option>
                                                <option data-content="<img class='left-image' src='assets/images/icons/fr.png' alt='Language Images'> Spanish">Spanish</option>
                                                <option data-content="<img class='left-image' src='assets/images/icons/en-us.png' alt='Language Images'> Italiic">Italic</option>
                                                <option data-content="<img class='left-image' src='assets/images/icons/fr.png' alt='Language Images' > French">French</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="select-area mt--20">
                                        <h6 class="text">Generate Language</h6>

                                        <div class="rbt-modern-select bg-transparent height-45">
                                            <select>
                                                <option data-content="<img class='left-image' src='assets/images/icons/en-us.png' alt='Language Images'> English">English</option>
                                                <option data-content="<img class='left-image' src='assets/images/icons/fr.png' alt='Language Images'> Spanish">Spanish</option>
                                                <option data-content="<img class='left-image' src='assets/images/icons/en-us.png' alt='Language Images'> Italiic">Italic</option>
                                                <option selected data-content="<img class='left-image' src='assets/images/icons/fr.png' alt='Language Images' > French">French</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--New Chat Section Modal HTML -->
        <?php include './partials/newchatModal.php' ?>

        <!--Like Section Modal HTML -->
        <?php include './partials/likeModal.php' ?>

        <!--DisLike Section Modal HTML -->
        <?php include './partials/dislikeModal.php' ?>

        <!--Share Section Modal HTML -->
        <?php include './partials/shareModal.php' ?>

    </main>

    <!-- start script -->
    <?php include './partials/script.php' ?>
    <!-- End  script -->

</body>

</html>