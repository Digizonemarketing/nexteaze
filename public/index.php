<!DOCTYPE html>
<html lang="en">

<?php $title = 'Home' ?>
<?php include '../src/views/common/head.php'; ?>

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
        <header class="rainbow-header header-default header-not-transparent header-sticky">
            <div class="container position-relative">
                <div class="row align-items-center row--0">
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="logo">
                            <a href="index.php">
                                <img class="logo-light" src="../public/images/logo/NextEase.svg" alt="ChatBot Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-6 col-6 position-static">
                        <div class="header-right">

                            <nav class="mainmenu-nav d-none d-lg-block">
                                <ul class="mainmenu">
                                    <li><a href="dashboard.php">Welcome</a></li>
                                    <li class="with-megamenu has-menu-child-item position-relative"><a href="#">Dashboard</a>
                                        <div class="rainbow-megamenu right-align with-mega-item-2">
                                            <div class="wrapper p-0">
                                                <div class="row row--0">
                                                    <div class="col-lg-6 single-mega-item">
                                                        <h3 class="rbt-short-title">DASHBOARD PAGES</h3>
                                                        <ul class="mega-menu-item">
                                                            <li>
                                                                <a href="profile-details.php">
                                                                    <span>Profile</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="notification.php">
                                                                    <span>Notification</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="chat-export.php">
                                                                    <span>Chat Export</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="appearance.php">
                                                                    <span>Apperance</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="plans-billing.php">
                                                                    <span>Plans and Billing</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="sessions.php">
                                                                    <span>Sessions</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="application.php">
                                                                    <span>Application</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="release-notes.php">
                                                                    <span>Release notes</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="help.php">
                                                                    <span>Help & FAQs</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-6 single-mega-item">
                                                        <div class="header-menu-img">
                                                            <img src="../public/images/menu-img/menu-img-2.png" alt="Menu Split Image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li><a href="pricing.php">Pricing</a></li>
                                    <li><a href="signin.php">Sign In</a></li>
                                </ul>
                            </nav>

                            <!-- Start Header Btn  -->
                            <div class="header-btn">
                                <a class="btn-default btn-small round" target="_blank" href="text-generator.php">Get Started Free</a>
                            </div>
                            <!-- End Header Btn  -->

                            <!-- Start Tools Area -->
                            <div class="mainmenu-nav d-none d-lg-block one-menu">
                                <ul class="mainmenu one-menu-item">
                                    <li class="with-megamenu has-menu-child-item position-relative menu-item-open">
                                        <a class="header-round-btn" href="#">
                                            <span><i class="feather-grid"></i></span>
                                        </a>
                                        <div class="rainbow-megamenu with-mega-item-2 right-align">
                                            <div class="wrapper">
                                                <div class="row row--0">
                                                    <div class="col-lg-4 single-mega-item">
                                                        <div class="genarator-section">
                                                            <ul class="genarator-card-group full-width-list">
                                                                <li>
                                                                    <a href="text-generator.php" class="genarator-card bg-flashlight-static center-align">
                                                                        <div class="inner bottom-flashlight">
                                                                            <div class="left-align">
                                                                                <div class="img-bar">
                                                                                    <img src="../public/images/generator-icon/text_line.png" alt="AI Generator">
                                                                                </div>
                                                                                <h5 class="title">Text Generator</h5>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="vedio-generator.php" class="genarator-card center-align bg-flashlight-static">
                                                                        <div class="inner bottom-flashlight">
                                                                            <div class="left-align">
                                                                                <div class="img-bar">
                                                                                    <img src="../public/images/generator-icon/video-camera_line.png" alt="AI Generator">
                                                                                </div>
                                                                                <h5 class="title">Vedio Generator</h5>
                                                                            </div>
                                                                        </div>
                                                                        <span class="rainbow-badge-card">Hot</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="code-generator.php" class="genarator-card center-align bg-flashlight-static">
                                                                        <div class="inner bottom-flashlight">
                                                                            <div class="left-align">
                                                                                <div class="img-bar">
                                                                                    <img src="../public/images/generator-icon/code-editor_line.png" alt="AI Generator">
                                                                                </div>
                                                                                <h5 class="title">HTML Generator</h5>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="genarator-card center-align bg-flashlight-static disabled" tabindex="-1">
                                                                        <div class="inner bottom-flashlight">
                                                                            <div class="left-align">
                                                                                <div class="img-bar">
                                                                                    <img src="../public/images/generator-icon/lyrics_line.png" alt="AI Generator">
                                                                                </div>
                                                                                <h5 class="title">Lyrics Generator</h5>
                                                                            </div>
                                                                        </div>
                                                                        <span class="rainbow-badge-card">Comming</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 single-mega-item">
                                                        <div class="genarator-section">
                                                            <ul class="genarator-card-group full-width-list">
                                                                <li>
                                                                    <a href="image-editor.php" class="genarator-card center-align bg-flashlight-static">
                                                                        <div class="inner bottom-flashlight">
                                                                            <div class="left-align">
                                                                                <div class="img-bar">
                                                                                    <img src="../public/images/generator-icon/photo-editor_line.png" alt="AI Generator">
                                                                                </div>
                                                                                <h5 class="title">Photo Editor</h5>
                                                                            </div>
                                                                        </div>
                                                                        <span class="rainbow-badge-card">Hot</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="image-generator.php" class="genarator-card center-align bg-flashlight-static">
                                                                        <div class="inner bottom-flashlight">
                                                                            <div class="left-align">
                                                                                <div class="img-bar">
                                                                                    <img src="../public/images/generator-icon/photo_line.png" alt="AI Generator">
                                                                                </div>
                                                                                <h5 class="title">Image Generator</h5>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="text-generator.php" class="genarator-card center-align bg-flashlight-static">
                                                                        <div class="inner bottom-flashlight">
                                                                            <div class="left-align">
                                                                                <div class="img-bar">
                                                                                    <img src="../public/images/generator-icon/voice_line.png" alt="AI Generator">
                                                                                </div>
                                                                                <h5 class="title">Speech to text</h5>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="genarator-card center-align bg-flashlight-static disabled" tabindex="-1">
                                                                        <div class="inner bottom-flashlight">
                                                                            <div class="left-align">
                                                                                <div class="img-bar">
                                                                                    <img src="../public/images/generator-icon/website-design_line.png" alt="AI Generator">
                                                                                </div>
                                                                                <h5 class="title">Website Generator</h5>
                                                                            </div>
                                                                        </div>
                                                                        <span class="rainbow-badge-card">Comming</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 single-mega-item">
                                                        <div class="genarator-section">
                                                            <ul class="genarator-card-group full-width-list">
                                                                <li>
                                                                    <a href="code-generator.php" class="genarator-card center-align bg-flashlight-static">
                                                                        <div class="inner bottom-flashlight">
                                                                            <div class="left-align">
                                                                                <div class="img-bar">
                                                                                    <img src="../public/images/generator-icon/code-editor_line.png" alt="AI Generator">
                                                                                </div>
                                                                                <h5 class="title">Code Generator</h5>
                                                                            </div>
                                                                        </div>
                                                                        <span class="rainbow-badge-card">Hot</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="email-generator.php" class="genarator-card center-align bg-flashlight-static">
                                                                        <div class="inner bottom-flashlight">
                                                                            <div class="left-align">
                                                                                <div class="img-bar">
                                                                                    <img src="../public/images/generator-icon/email_line.png" alt="AI Generator">
                                                                                </div>
                                                                                <h5 class="title">Email Writer</h5>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="text-generator.php" class="genarator-card center-align bg-flashlight-static">
                                                                        <div class="inner bottom-flashlight">
                                                                            <div class="left-align">
                                                                                <div class="img-bar">
                                                                                    <img src="../public/images/generator-icon/text-voice_line.png" alt="AI Generator">
                                                                                </div>
                                                                                <h5 class="title">Text to speech</h5>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="text-generator.php" class="genarator-card center-align bg-flashlight-static disabled center-align" tabindex="-1">
                                                                        <div class="inner bottom-flashlight">
                                                                            <div class="left-align">
                                                                                <div class="img-bar">
                                                                                    <img src="../public/images/generator-icon/document_line.png" alt="AI Generator">
                                                                                </div>
                                                                                <h5 class="title">Chat with Documents</h5>
                                                                            </div>
                                                                        </div>
                                                                        <span class="rainbow-badge-card">Comming</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Tools Area -->

                            <!-- Start Mobile-Menu-Bar -->
                            <div class="mobile-menu-bar ml--5 d-block d-lg-none">
                                <div class="hamberger">
                                    <button class="hamberger-button">
                                        <i class="feather-menu"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- Start Mobile-Menu-Bar -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- End  header -->

        <!-- start mobilemenu -->
        <!-- <?php include './partials/mobilemenu.php' ?> -->
        <!-- <?php include '../src/views/common/mobilemenu.php' ?> -->
        <!-- End  mobilemenu -->

        <!-- start Preloader -->
        <!-- <?php include './partials/preloader.php' ?> -->
        <!-- End Preloader -->




        <!-- Start Slider Area -->
        <div class="slider-area slider-style-1 variation-default slider-bg-image bg-banner1" data-black-overlay="1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="inner text-center mt--60">
                            <h1 class="title display-one">Welcome to
                                <span class="theme-gradient">VerifyEase</span><br><span class="color-off">Your Trusted Product Verification Portal</span>
                            </h1>
                            <p class="b1 desc-text">Ensure authenticity and build customer trust with our seamless verification solutions.</p>
                            <div class="button-group">
                                <a class="btn-default bg-light-gradient btn-large" href="#">
                                    <div class="has-bg-light"></div>
                                    <span>Get Started Today</span>
                                </a>
                            </div>
                            <p class="color-gray mt--5">🔒 Secure and Reliable Verification</p>
                        </div>
                    </div>
                    <!-- <div class="col-lg-10 col-xl-10 order-1 order-lg-2">
                        <div class="frame-image frame-image-bottom bg-flashlight">
                            <img src="./images/banner/Bulb.png" alt="VerifyEase Banner Image">
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="chatenai-separator has-position-bottom">
                <img class="w-100" src="images/separator/separator-top.svg" alt="">
            </div>
        </div>
        <!-- End Slider Area -->

        <!-- Start Service__Style--1 Area -->
        <div class="rainbow-service-area rainbow-section-gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center" data-sal="slide-up" data-sal-duration="700" data-sal-delay="100">
                            <h4 class="subtitle">
                                <span class="theme-gradient">WHY CHOOSE VERIFYEASE?</span>
                            </h4>
                            <h2 class="title w-600 mb--20">Comprehensive Product Verification</h2>
                            <p class="description b1">Protect Your Brand, Customers, and Reputation with our Robust Verification Tools.</p>
                        </div>
                    </div>
                </div>

                <div class="row row--15 service-wrapper">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-sal="slide-up" data-sal-duration="700">
                        <div class="service service__style--1 bg-color-blackest radius mt--25 text-center rbt-border-none variation-4 bg-flashlight">
                            <div class="icon">
                                <i class="feather-shield"></i>
                            </div>
                            <div class="content">
                                <h4 class="title w-600">
                                    <a href="#">Secure Verification</a>
                                </h4>
                                <p class="description b1 color-gray mb--0">Ensure product authenticity with advanced security features tailored to protect your brand.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-sal="slide-up" data-sal-duration="700" data-sal-delay="100">
                        <div class="service service__style--1 bg-color-blackest radius mt--25 text-center rbt-border-none variation-4 bg-flashlight">
                            <div class="icon">
                                <i class="feather-globe"></i>
                            </div>
                            <div class="content">
                                <h4 class="title w-600">
                                    <a href="#">Global Reach</a>
                                </h4>
                                <p class="description b1 color-gray mb--0">Verify products globally with our accessible and user-friendly platform, ensuring trust across borders.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-sal="slide-up" data-sal-duration="700" data-sal-delay="200">
                        <div class="service service__style--1 bg-color-blackest radius mt--25 text-center rbt-border-none variation-4 bg-flashlight">
                            <div class="icon">
                                <i class="feather-monitor"></i>
                            </div>
                            <div class="content">
                                <h4 class="title w-600">
                                    <a href="#">Real-Time Monitoring</a>
                                </h4>
                                <p class="description b1 color-gray mb--0">Track and verify your products in real-time, with instant updates and reports to keep you informed.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-sal="slide-up" data-sal-duration="700">
                        <div class="service service__style--1 bg-color-blackest radius mt--25 text-center rbt-border-none variation-4 bg-flashlight">
                            <div class="icon">
                                <i class="feather-check-circle"></i>
                            </div>
                            <div class="content">
                                <h4 class="title w-600">
                                    <a href="#">User-Friendly Interface</a>
                                </h4>
                                <p class="description b1 color-gray mb--0">Navigate our platform with ease, designed for quick and efficient product verification.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-sal="slide-up" data-sal-duration="700" data-sal-delay="100">
                        <div class="service service__style--1 bg-color-blackest radius mt--25 text-center rbt-border-none variation-4 bg-flashlight">
                            <div class="icon">
                                <i class="feather-server"></i>
                            </div>
                            <div class="content">
                                <h4 class="title w-600">
                                    <a href="#">Scalable Solutions</a>
                                </h4>
                                <p class="description b1 color-gray mb--0">Whether you're a small business or a global enterprise, VerifyEase scales with your needs.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-sal="slide-up" data-sal-duration="700" data-sal-delay="200">
                        <div class="service service__style--1 bg-color-blackest radius mt--25 text-center rbt-border-none variation-4 bg-flashlight">
                            <div class="icon">
                                <i class="feather-lock"></i>
                            </div>
                            <div class="content">
                                <h4 class="title w-600">
                                    <a href="#">Data Privacy</a>
                                </h4>
                                <p class="description b1 color-gray mb--0">Your data is safe with us. We prioritize your privacy with strict security protocols.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Service__Style--1 Area -->

        <!-- Start Seperator Area -->
        <div class="chatenai-separator">
            <img class="w-100" src="images/separator/separator-top.svg" alt="">
        </div>
        <!-- End Seperator Area -->

        <!-- Start Timeline-Style-Four -->
        <div class="rainbow-timeline-area rainbow-section-gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center" data-sal="slide-up" data-sal-duration="700" data-sal-delay="100">
                            <h4 class="subtitle ">
                                <span class="theme-gradient">HOW VERIFYEASE WORKS</span>
                            </h4>
                            <h2 class="title w-600 mb--20">Simple, Fast, and Reliable</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class=" b-width col-lg-10 offset-lg-1 mt--30">
                        <div class="timeline-style-two bg-flashlight bg-color-blackest">
                            <div class="row row--0">
                                <div class="col-lg-4 col-md-4 rainbow-timeline-single dark-line">
                                    <div class="rainbow-timeline">
                                        <h6 class="title" data-sal="slide-up" data-sal-duration="700" data-sal-delay="200">1. Register Your Product</h6>
                                        <div class="progress-line">
                                            <div class="line-inner"></div>
                                        </div>
                                        <div class="progress-dot">
                                            <div class="dot-level">
                                                <div class="dot-inner"></div>
                                            </div>
                                        </div>
                                        <p class="description" data-sal="slide-up" data-sal-duration="700" data-sal-delay="300">Add your product details to our secure database.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 rainbow-timeline-single dark-line">
                                    <div class="rainbow-timeline">
                                        <h6 class="title" data-sal="slide-up" data-sal-duration="700" data-sal-delay="200">2. Generate Verification Codes</h6>
                                        <div class="progress-line">
                                            <div class="line-inner"></div>
                                        </div>
                                        <div class="progress-dot">
                                            <div class="dot-level">
                                                <div class="dot-inner"></div>
                                            </div>
                                        </div>
                                        <p class="description" data-sal="slide-up" data-sal-duration="700" data-sal-delay="300">Create unique codes for each product, customizable to your needs.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 rainbow-timeline-single dark-line">
                                    <div class="rainbow-timeline">
                                        <h6 class="title" data-sal="slide-up" data-sal-duration="700" data-sal-delay="200">3. Verify & Monitor</h6>
                                        <div class="progress-line">
                                            <div class="line-inner"></div>
                                        </div>
                                        <div class="progress-dot">
                                            <div class="dot-level">
                                                <div class="dot-inner"></div>
                                            </div>
                                        </div>
                                        <p class="description" data-sal="slide-up" data-sal-duration="700" data-sal-delay="300">Allow customers to verify products easily and monitor verification activity in real-time.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class=" b-width col-lg-10 offset-lg-1 mt--30">
                        <div class="timeline-style-two bg-flashlight bg-color-blackest">
                            <div class="row row--0">
                                <div class="content text-center">
                                    <h2 class="title">Start Verifying Today</h2>
                                    <p class="description">Join VerifyEase and take control of your product authenticity.</p>
                                    <div class="button-group">
                                        <a class="btn-default bg-light-gradient btn-large" href="#">
                                            <div class="has-bg-light"></div>
                                            <span>Get Started Now</span>
                                        </a>
                                    </div>
                                    <p class="color-gray mt--5">🔒 Join our network of trusted brands.</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Timeline-Style-Four -->

        <!-- Start Seperator Area  -->
        <div class="chatenai-separator">
            <img class="w-100" src="../public/images/separator/separator-bottom.svg" alt="">
        </div>
        <!-- End Seperator Area  -->

        <!-- Start Split Style-1 Area  -->
        <div class="rainbow-split-area rainbow-section-gap">
            <div class="container">
                <div class="rainbow-splite-style">
                    <div class="split-wrapper">
                        <div class="row g-0 radius-10 align-items-center">
                            <div class="col-lg-12 col-xl-6 col-12">
                                <div class="thumbnail ">
                                    <img class="portal-img radius" src="./images/banner/smartmockups_lzs984m1.webp" alt="split Images">
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6 col-12">
                                <div class="split-inner">
                                    <h4 class="title" data-sal="slide-up" data-sal-duration="400" data-sal-delay="200">Effortless Product Verification with VerifyEase</h4>
                                    <p class="description" data-sal="slide-up" data-sal-duration="400" data-sal-delay="300">Streamline Your Product Verification: Generate Unique Codes, Customize Prefixes, Postfixes, and Lengths, and Enhance Security and Trust.</p>
                                    <ul class="split-list" data-sal="slide-up" data-sal-duration="400" data-sal-delay="350">
                                        <li>- Generate Verification Codes Quickly and Efficiently.</li>
                                        <li>- Customize Code Attributes to Fit Your Needs.</li>
                                        <li>- Secure and Manage Product Data with Ease.</li>
                                    </ul>
                                    <div class="view-more-button mt--35" data-sal="slide-up" data-sal-duration="400" data-sal-delay="400">
                                        <a class="btn-default" href="contact.php">Get Started with VerifyEase</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Split Style-1 Area  -->

        <!-- Start Seperator Area  -->
        <div class="chatenai-separator">
            <img class="w-100" src="../public/images/separator/separator-top.svg" alt="">
        </div>
        <!-- End Seperator Area  -->

        <!-- Start Pricing Area  -->
        <div class="rainbow-pricing-area rainbow-section-gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center" data-sal="slide-up" data-sal-duration="400" data-sal-delay="150">
                            <h4 class="subtitle "><span class="theme-gradient">Pricing</span></h4>
                            <h2 class="title w-600 mb--20">Choose Your VerifyEase Plan</h2>
                            <p class="description b1">Select the ideal plan to streamline your product verification process with VerifyEase.</p>
                        </div>
                    </div>
                </div>
                <div class="row row--15">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="rainbow-pricing style-2">
                            <div class="pricing-table-inner bg-flashlight">
                                <div class="pricing-header">
                                    <h4 class="title">Starter</h4>
                                    <div class="pricing">
                                        <div class="price-wrapper"><span class="price">Free</span></div><span class="subtitle">Forever</span>
                                    </div>
                                </div>
                                <div class="separator-animated mt--30 mb--30"></div>
                                <div class="pricing-body">
                                    <ul class="list-style--1">
                                        <li><i class="feather-check-circle"></i> 500 Verification Codes</li>
                                        <li><i class="feather-check-circle"></i> Basic Code Customization</li>
                                        <li><i class="feather-check-circle"></i> Basic Security Features</li>
                                        <li><i class="feather-check-circle"></i> Basic Analytics Dashboard</li>
                                        <li><i class="feather-minus-circle"></i> Advanced Reporting</li>
                                        <li><i class="feather-minus-circle"></i> Priority Support</li>
                                    </ul>
                                </div>
                                <div class="pricing-footer"><a class="btn-default btn-border" href="#">Start Free</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="rainbow-pricing style-2 active">
                            <div class="pricing-table-inner bg-flashlight">
                                <div class="pricing-header">
                                    <h4 class="title">Professional</h4>
                                    <div class="pricing">
                                        <div class="price-wrapper"><span class="currency">$</span><span class="price">50</span></div><span class="subtitle">USD Per Month</span>
                                    </div>
                                </div>
                                <div class="separator-animated animated-true mt--30 mb--30"></div>
                                <div class="pricing-body">
                                    <ul class="list-style--1">
                                        <li><i class="feather-check-circle"></i> 5,000 Verification Codes</li>
                                        <li><i class="feather-check-circle"></i> Advanced Code Customization</li>
                                        <li><i class="feather-check-circle"></i> Enhanced Security Features</li>
                                        <li><i class="feather-check-circle"></i> Advanced Analytics Dashboard</li>
                                        <li><i class="feather-check-circle"></i> Customizable Reporting</li>
                                        <li><i class="feather-check-circle"></i> Priority Support</li>
                                    </ul>
                                </div>
                                <div class="pricing-footer"><a class="btn-default" href="#">Choose Plan</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="rainbow-pricing style-2">
                            <div class="pricing-table-inner bg-flashlight">
                                <div class="pricing-header">
                                    <h4 class="title">Enterprise</h4>
                                    <div class="pricing">
                                        <div class="price-wrapper"><span class="currency">$</span><span class="price">150</span></div><span class="subtitle">USD Per Month</span>
                                    </div>
                                </div>
                                <div class="separator-animated mt--30 mb--30"></div>
                                <div class="pricing-body">
                                    <ul class="list-style--1">
                                        <li><i class="feather-check-circle"></i> 15,000 Verification Codes</li>
                                        <li><i class="feather-check-circle"></i> Full Code Customization</li>
                                        <li><i class="feather-check-circle"></i> Top-Tier Security Features</li>
                                        <li><i class="feather-check-circle"></i> Comprehensive Analytics Dashboard</li>
                                        <li><i class="feather-check-circle"></i> Detailed Reporting and Insights</li>
                                        <li><i class="feather-check-circle"></i> Dedicated Support</li>
                                    </ul>
                                </div>
                                <div class="pricing-footer"><a class="btn-default btn-border" href="#">Get Started</a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="button-group mt--50 text-center">
                    <a class="btn-default btn-large btn-border" href="pricing.php">View Comparison</a>
                </div>
            </div>
        </div>

        <!-- End Pricing Area  -->




        <!-- Start Seperator Area  -->
        <div class="chatenai-separator">
            <img class="w-100" src="../public/images/separator/separator-top.svg" alt="">
        </div>
        <!-- End Seperator Area  -->

        <!-- Start Accordion-2 Area  -->
        <div class="rainbow-accordion-area rainbow-section-gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="section-title text-center" data-sal="slide-up" data-sal-duration="700" data-sal-delay="100">
                            <h4 class="subtitle "><span class="theme-gradient">Accordion</span></h4>
                            <h2 class="title w-600 mb--20">Frequently Asked Questions</h2>
                        </div>
                    </div>
                </div>
                <div class="row mt--35 row--20">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="rainbow-accordion-style accordion">
                            <div class="accordion" id="accordionExamplea">
                                <div class="accordion-item card bg-flashlight">
                                    <h2 class="accordion-header card-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            What is VerifyEase and how does it work?
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExamplea">
                                        <div class="accordion-body card-body">
                                            VerifyEase is a product verification platform designed to authenticate and track products using unique verification codes. Our system allows businesses to create, manage, and validate these codes to ensure product authenticity and streamline verification processes.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card bg-flashlight">
                                    <h2 class="accordion-header card-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            What features are included in each pricing plan?
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExamplea">
                                        <div class="accordion-body card-body">
                                            Our pricing plans offer varying levels of features:
                                            <ul>
                                                <li><strong>Starter:</strong> 500 verification codes, basic customization, basic security, and analytics.</li>
                                                <li><strong>Professional:</strong> 5,000 codes, advanced customization, enhanced security, and customizable reporting.</li>
                                                <li><strong>Enterprise:</strong> 15,000 codes, full customization, top-tier security, comprehensive analytics, and dedicated support.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card bg-flashlight">
                                    <h2 class="accordion-header card-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            How often will I receive updates and how do I get them?
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExamplea">
                                        <div class="accordion-body card-body">
                                            VerifyEase is continuously updated to enhance features and security. Updates are rolled out regularly, and you will receive notifications for any new features or improvements. Updates are available at no additional cost as part of your subscription.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card bg-flashlight">
                                    <h2 class="accordion-header card-header" id="headingFour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            How can I get customer support?
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExamplea">
                                        <div class="accordion-body card-body">
                                            For any support needs, please contact us via email at support@verifyease.com. Our support team is available to assist with any questions or issues you may have.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card bg-flashlight">
                                    <h2 class="accordion-header card-header" id="headingFive">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                            Is my data safe with VerifyEase?
                                        </button>
                                    </h2>
                                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExamplea">
                                        <div class="accordion-body card-body">
                                            Yes, VerifyEase is committed to protecting your data with robust security measures. We use encryption and secure protocols to ensure that your data remains confidential and safe.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card bg-flashlight">
                                    <h2 class="accordion-header card-header" id="headingSix">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                            Is VerifyEase available in multiple languages?
                                        </button>
                                    </h2>
                                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExamplea">
                                        <div class="accordion-body card-body">
                                            Currently, VerifyEase supports multiple languages to accommodate a global user base. We are continuously expanding our language options to better serve our international clients.
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Accordion-2 Area  -->

        <!-- Start Seperator Area  -->
        <div class="chatenai-separator">
            <img class="w-100" src="../public/images/separator/separator-bottom.svg" alt="">
        </div>
        <!-- End Seperator Area  -->

        <!-- Start Brands Area -->
        <div class="rainbow-brand-area rainbow-section-gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center sal-animate" data-sal="slide-up" data-sal-duration="700" data-sal-delay="100">
                            <h4 class="subtitle "><span class="theme-gradient">Our Awesome Client</span></h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 mt--10">
                        <ul class="brand-list brand-style-2">
                            <li><a href="#"><img src="../public/images/brand/brand-01.png" alt="Brand Image"></a></li>
                            <li><a href="#"><img src="../public/images/brand/brand-02.png" alt="Brand Image"></a></li>
                            <li><a href="#"><img src="../public/images/brand/brand-03.png" alt="Brand Image"></a></li>
                            <li><a href="#"><img src="../public/images/brand/brand-04.png" alt="Brand Image"></a></li>
                            <li><a href="#"><img src="../public/images/brand/brand-05.png" alt="Brand Image"></a></li>
                            <li><a href="#"><img src="../public/images/brand/brand-06.png" alt="Brand Image"></a></li>
                            <li><a href="#"><img src="../public/images/brand/brand-07.png" alt="Brand Image"></a></li>
                            <li><a href="#"><img src="../public/images/brand/brand-08.png" alt="Brand Image"></a></li>
                            <li><a href="#"><img src="../public/images/brand/brand-01.png" alt="Brand Image"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Brands Area -->

        <!-- Start Seperator Area  -->
        <div class="chatenai-separator">
            <img class="w-100" src="../public/images/separator/separator-top.svg" alt="">
        </div>
        <!-- End Seperator Area  -->

        <!-- Start Call TO Action Area  -->
        <div class="rainbow-callto-action-area">
            <div class="wrapper">
                <div class="rainbow-callto-action clltoaction-style-default rainbow-section-gap">
                    <div class="container">
                        <div class="row row--0">
                            <div class="col-lg-12">
                                <div class="align-items-center content-wrapper">
                                    <div class="inner">
                                        <div class="content text-center">
                                            <span class="theme-gradient b2 mb--30 d-inline-block">Enhance Your Product Verification</span>
                                            <h2 class="title" data-sal="slide-up" data-sal-duration="400" data-sal-delay="200">Streamline Your Verification Process Today</h2>
                                            <p class="description" data-sal="slide-up" data-sal-duration="400" data-sal-delay="300">Unlock Advanced Tools for Seamless Product Authentication.</p>
                                            <div class="call-to-btn" data-sal="slide-up" data-sal-duration="400" data-sal-delay="350">
                                                <a class="btn-default bg-light-gradient btn-large" href="contact.php">
                                                    <div class="has-bg-light"></div>
                                                    <span>Get Started with VerifyEase</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="fancy-genearate-section">
                    <div class="container">
                        <div class="genarator-section">
                            <ul class="genarator-card-group full-width-list">
                                <li>
                                    <a href="product-verification.php" class="genarator-card bg-flashlight-static center-align">
                                        <div class="inner">
                                            <div class="left-align">
                                                <div class="img-bar">
                                                    <img src="./images/icons/Product Verification.png" alt="Product Verification">
                                                </div>
                                                <h5 class="title">Product Verification</h5>
                                                <span class="rainbow-demo-btn">Try It Now Free</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="code-generator.php" class="genarator-card bg-flashlight-static center-align">
                                        <div class="inner">
                                            <div class="left-align">
                                                <div class="img-bar">
                                                    <img src="../public/images/generator-icon/code-editor_line.png" alt="Code Generator">
                                                </div>
                                                <h5 class="title">Code Generator</h5>
                                                <span class="rainbow-demo-btn">Try It Now Free</span>
                                                <span class="rainbow-badge-card ml--10">Hot</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="report-generator.php" class="genarator-card bg-flashlight-static center-align">
                                        <div class="inner">
                                            <div class="left-align">
                                                <div class="img-bar">
                                                    <img src="./images/icons/Report Generator.png" alt="Report Generator">
                                                </div>
                                                <h5 class="title">Report Generator</h5>
                                                <span class="rainbow-demo-btn">Try It Now Free</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="data-analysis.php" class="genarator-card bg-flashlight-static center-align">
                                        <div class="inner">
                                            <div class="left-align">
                                                <div class="img-bar">
                                                    <img src="./images/icons/Data Analysis.png" alt="Data Analysis">
                                                </div>
                                                <h5 class="title">Data Analysis</h5>
                                                <span class="rainbow-demo-btn">Try It Now Free</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="integration-tools.php" class="genarator-card bg-flashlight-static center-align">
                                        <div class="inner">
                                            <div class="left-align">
                                                <div class="img-bar">
                                                    <img src="./images/icons/Integration Tools.png" alt="Integration Tools">
                                                </div>
                                                <h5 class="title">Integration Tools</h5>
                                                <span class="rainbow-demo-btn">Try It Now Free</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="chatenai-separator has-position-bottom">
                                <img class="w-100" src="images/separator/separator-top.svg" alt="">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- End Call TO Action Area  -->

        <!-- Start Footer Area  -->
        <?php include '../src/views/common/footer.php' ?>
        <!-- End Footer Area  -->

        <!-- Start Copy Right Area  -->
        <?php include '../src/views/common/copyRight.php' ?>
        <!-- End Copy Right Area  -->

        <div class="rn-progress-parent">
            <svg class="rn-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
            </svg>
        </div>
    </main>
    <!-- All Scripts  -->

    <!-- JS -->
    <script src="../public/js/vendor/modernizr.min.js"></script>
    <script src="../public/js/vendor/jquery.min.js"></script>
    <script src="../public/js/vendor/bootstrap.min.js"></script>
    <script src="../public/js/vendor/popper.min.js"></script>
    <script src="../public/js/vendor/waypoint.min.js"></script>
    <script src="../public/js/vendor/wow.min.js"></script>
    <script src="../public/js/vendor/counterup.min.js"></script>
    <script src="../public/js/vendor/feather.min.js"></script>
    <script src="../public/js/vendor/sal.min.js"></script>
    <script src="../public/js/vendor/backto-top.js"></script>
    <script src="../public/js/vendor/masonry.js"></script>
    <script src="../public/js/vendor/imageloaded.js"></script>
    <script src="../public/js/vendor/magnify.min.js"></script>
    <script src="../public/js/vendor/lightbox.js"></script>
    <script src="../public/js/vendor/slick.min.js"></script>
    <script src="../public/js/vendor/easypie.js"></script>
    <script src="../public/js/vendor/text-type.js"></script>
    <script src="../public/js/vendor/prism.js"></script>
    <script src="../public/js/vendor/jquery.style.swicher.js"></script>
    <script src="../public/js/vendor/bootstrap-select.min.js"></script>

    <script src="../public/js/vendor/js.cookie.js"></script>
    <script src="../public/js/vendor/jquery-one-page-nav.js"></script>
    <!-- Main JS -->
    <script src="../public/js/main.js"></script>

</html>