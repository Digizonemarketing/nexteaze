<!DOCTYPE html>
<?php
session_start(); // Start the session

// Regenerate session ID for security
session_regenerate_id(true);

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: signin.php"); // Redirect to login page if not logged in
    exit();
} ?>
<html lang="en">

<?php $title = 'Plans & Billing' ?>
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
                            <!-- ChatenAI small Slider -->
                            <?php include '../common/setting-bar.php'; ?>

                        </div>
                        <div class="content-page pb--50">
                            <!-- Pricing Part -->


                            <div class="wrapper">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <nav class="chatenai-tab">
                                            <div class="tab-btn-grp nav nav-tabs text-center justify-content-center" id="nav-tab" role="tablist">
                                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                                                    type="button" role="tab" aria-controls="nav-home" aria-selected="true">Monthly</button>
                                                <button class="nav-link with-badge" id="nav-profile-tab" data-bs-toggle="tab"
                                                    data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                                                    aria-selected="false">Yearly <span class="rainbow-badge-card badge-border">20%
                                                        Off</span></button>
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                                <div class="tab-content rainbow-section-gap bg-transparent bg-light" id="nav-tabContent">
                                    <!-- Monthly Plans -->
                                    <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="row row--15 mt_dec--30">
                                            <!-- Business Plan -->
                                            <div class="col-xl-4 col-lg-6 col-md-6 col-12 mt--30">
                                                <div class="rainbow-pricing style-chatenai mt--0 active">
                                                    <div class="pricing-table-inner bg-flashlight">
                                                        <div class="pricing-top">
                                                            <div class="pricing-header">
                                                                <h4 class="title">Business</h4>
                                                                <div class="pricing">
                                                                    <div class="price-wrapper">
                                                                        <span class="currency">$</span><span class="price">50</span>
                                                                    </div>
                                                                    <span class="subtitle">USD Per Month</span>
                                                                </div>
                                                                <div class="separator-animated mt--30 mb--30"></div>
                                                            </div>
                                                            <div class="pricing-body">
                                                                <ul class="list-style--1">
                                                                    <li><i class="feather-check-circle"></i> 10,000 Verification Codes</li>
                                                                    <li><i class="feather-check-circle"></i> Basic Analytics Dashboard</li>
                                                                    <li><i class="feather-check-circle"></i> Email Support</li>
                                                                    <li><i class="feather-check-circle"></i> Standard Security Features</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="pricing-footer">
                                                            <a class="btn-default" href="#">Purchase Now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Advanced Plan -->
                                            <div class="col-xl-4 col-lg-6 col-md-6 col-12 mt--30">
                                                <div class="rainbow-pricing style-chatenai mt--0 active">
                                                    <div class="pricing-table-inner bg-flashlight">
                                                        <div class="pricing-top">
                                                            <div class="pricing-header">
                                                                <h4 class="title">Advanced</h4>
                                                                <div class="pricing">
                                                                    <div class="price-wrapper">
                                                                        <span class="currency">$</span><span class="price">100</span>
                                                                    </div>
                                                                    <span class="subtitle">USD Per Month</span>
                                                                </div>
                                                                <div class="separator-animated mt--30 mb--30"></div>
                                                            </div>
                                                            <div class="pricing-body">
                                                                <ul class="list-style--1">
                                                                    <li><i class="feather-check-circle"></i> 50,000 Verification Codes</li>
                                                                    <li><i class="feather-check-circle"></i> Detailed Analytics Dashboard</li>
                                                                    <li><i class="feather-check-circle"></i> Priority Email & Phone Support</li>
                                                                    <li><i class="feather-check-circle"></i> Advanced Security Features</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="pricing-footer">
                                                            <a class="btn-default" href="#">Purchase Now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Enterprise Plan -->
                                            <div class="col-xl-4 col-lg-6 col-md-6 col-12 mt--30">
                                                <div class="rainbow-pricing style-chatenai mt--0">
                                                    <div class="pricing-table-inner bg-flashlight">
                                                        <div class="pricing-top">
                                                            <div class="pricing-header">
                                                                <h4 class="title">Enterprise</h4>
                                                                <div class="pricing">
                                                                    <div class="price-wrapper">
                                                                        <span class="price sm-text">Let's Talk</span>
                                                                    </div>
                                                                    <span class="subtitle">Customized Pricing</span>
                                                                </div>
                                                                <div class="separator-animated mt--30 mb--30"></div>
                                                            </div>
                                                            <div class="pricing-body">
                                                                <ul class="list-style--1">
                                                                    <li><i class="feather-check-circle"></i> Unlimited Verification Codes</li>
                                                                    <li><i class="feather-check-circle"></i> Custom Integrations & Features</li>
                                                                    <li><i class="feather-check-circle"></i> 24/7 Dedicated Support</li>
                                                                    <li><i class="feather-check-circle"></i> Premium Security & Compliance</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="pricing-footer">
                                                            <a class="btn-default btn-border" href="#">Contact Sales</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Yearly Plans -->
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="row row--15 mt_dec--30">
                                            <!-- Business Yearly Plan -->
                                            <div class="col-xl-4 col-lg-6 col-md-6 col-12 mt--30">
                                                <div class="rainbow-pricing style-chatenai mt--0 active">
                                                    <div class="pricing-table-inner bg-flashlight">
                                                        <div class="pricing-top">
                                                            <div class="pricing-header">
                                                                <h4 class="title">Business</h4>
                                                                <div class="pricing">
                                                                    <div class="price-wrapper">
                                                                        <span class="currency">$</span><span class="price">500</span>
                                                                    </div>
                                                                    <span class="subtitle">USD Per Year</span>
                                                                </div>
                                                                <div class="separator-animated mt--30 mb--30"></div>
                                                            </div>
                                                            <div class="pricing-body">
                                                                <ul class="list-style--1">
                                                                    <li><i class="feather-check-circle"></i> 10,000 Verification Codes</li>
                                                                    <li><i class="feather-check-circle"></i> Basic Analytics Dashboard</li>
                                                                    <li><i class="feather-check-circle"></i> Email Support</li>
                                                                    <li><i class="feather-check-circle"></i> Standard Security Features</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="pricing-footer">
                                                            <a class="btn-default" href="#">Purchase Now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Advanced Yearly Plan -->
                                            <div class="col-xl-4 col-lg-6 col-md-6 col-12 mt--30">
                                                <div class="rainbow-pricing style-chatenai mt--0 active">
                                                    <div class="pricing-table-inner bg-flashlight">
                                                        <div class="pricing-top">
                                                            <div class="pricing-header">
                                                                <h4 class="title">Advanced</h4>
                                                                <div class="pricing">
                                                                    <div class="price-wrapper">
                                                                        <span class="currency">$</span><span class="price">1,000</span>
                                                                    </div>
                                                                    <span class="subtitle">USD Per Year</span>
                                                                </div>
                                                                <div class="separator-animated mt--30 mb--30"></div>
                                                            </div>
                                                            <div class="pricing-body">
                                                                <ul class="list-style--1">
                                                                    <li><i class="feather-check-circle"></i> 50,000 Verification Codes</li>
                                                                    <li><i class="feather-check-circle"></i> Detailed Analytics Dashboard</li>
                                                                    <li><i class="feather-check-circle"></i> Priority Email & Phone Support</li>
                                                                    <li><i class="feather-check-circle"></i> Advanced Security Features</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="pricing-footer">
                                                            <a class="btn-default" href="#">Purchase Now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Enterprise Yearly Plan -->
                                            <div class="col-xl-4 col-lg-6 col-md-6 col-12 mt--30">
                                                <div class="rainbow-pricing style-chatenai mt--0">
                                                    <div class="pricing-table-inner bg-flashlight">
                                                        <div class="pricing-top">
                                                            <div class="pricing-header">
                                                                <h4 class="title">Enterprise</h4>
                                                                <div class="pricing">
                                                                    <div class="price-wrapper">
                                                                        <span class="price sm-text">Let's Talk</span>
                                                                    </div>
                                                                    <span class="subtitle">Customized Pricing</span>
                                                                </div>
                                                                <div class="separator-animated mt--30 mb--30"></div>
                                                            </div>
                                                            <div class="pricing-body">
                                                                <ul class="list-style--1">
                                                                    <li><i class="feather-check-circle"></i> Unlimited Verification Codes</li>
                                                                    <li><i class="feather-check-circle"></i> Custom Integrations & Features</li>
                                                                    <li><i class="feather-check-circle"></i> 24/7 Dedicated Support</li>
                                                                    <li><i class="feather-check-circle"></i> Premium Security & Compliance</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="pricing-footer">
                                                            <a class="btn-default btn-border" href="#">Contact Sales</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="rbt-sm-separator"></div>

                            <!-- Start Pricing Compare Detailed  -->
                            <div class="rainbow-pricing-detailed-area mt--60">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="section-title text-left mb--30" data-sal="slide-up" data-sal-duration="400" data-sal-delay="150">
                                            <h3 class="title w-600 mb--0">Detailed Compare</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row--15">
                                    <div class="col-lg-12">
                                        <div class="rainbow-compare-table style-1">
                                            <table class="table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th>Pricing</th>
                                                        <th class="sm-radius-top-left">Free</th>
                                                        <th class="style-prymary">Creator</th>
                                                        <th class="style-prymary">Business</th>
                                                        <th class="style-prymary sm-radius-top-right">Enterprise</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Price & Credits Section -->
                                                    <tr class="heading-row">
                                                        <td>
                                                            <h6>Price & Credits</h6>
                                                        </td>
                                                        <td>Free</td>
                                                        <td>$10 / mo</td>
                                                        <td>$50 / mo</td>
                                                        <td>Custom Pricing</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Verification Codes Included</td>
                                                        <td>50 Codes</td>
                                                        <td>500 Codes</td>
                                                        <td>2000 Codes</td>
                                                        <td>Customizable</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Additional Codes Pricing</td>
                                                        <td>$0.10 / Code</td>
                                                        <td>$0.08 / Code</td>
                                                        <td>$0.05 / Code</td>
                                                        <td>Custom</td>
                                                    </tr>
                                                    <tr>
                                                        <td>API Access for Codes</td>
                                                        <td>
                                                            <span class="icon bg-dark"><i class="feather-x"></i></span>
                                                        </td>
                                                        <td>
                                                            <span class="icon"><i class="feather-check"></i></span>
                                                        </td>
                                                        <td>
                                                            <span class="icon"><i class="feather-check"></i></span>
                                                        </td>
                                                        <td>
                                                            <span class="icon"><i class="feather-check"></i></span>
                                                        </td>
                                                    </tr>

                                                    <!-- Code Customization Section -->
                                                    <th class="heading-row">
                                                        <h6>Code Customization</h6>
                                                    </th>
                                                    <tr>
                                                        <td>Prefix/Postfix Options</td>
                                                        <td>Basic</td>
                                                        <td>Custom</td>
                                                        <td>Custom</td>
                                                        <td>Advanced</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Code Length Customization</td>
                                                        <td>Up to 6 Digits</td>
                                                        <td>Up to 9 Digits</td>
                                                        <td>Up to 12 Digits</td>
                                                        <td>Customizable</td>
                                                    </tr>
                                                    <tr>
                                                        <td>QR Code Generation</td>
                                                        <td>
                                                            <span class="icon bg-dark"><i class="feather-x"></i></span>
                                                        </td>
                                                        <td>
                                                            <span class="icon"><i class="feather-check"></i></span>
                                                        </td>
                                                        <td>
                                                            <span class="icon"><i class="feather-check"></i></span>
                                                        </td>
                                                        <td>Customizable</td>
                                                    </tr>

                                                    <!-- Data Analytics Section -->
                                                    <th class="heading-row">
                                                        <h6>Data Analytics & Tracking</h6>
                                                    </th>
                                                    <tr>
                                                        <td>Basic Analytics (Total Verifications)</td>
                                                        <td>
                                                            <span class="icon"><i class="feather-check"></i></span>
                                                        </td>
                                                        <td>
                                                            <span class="icon"><i class="feather-check"></i></span>
                                                        </td>
                                                        <td>
                                                            <span class="icon"><i class="feather-check"></i></span>
                                                        </td>
                                                        <td>
                                                            <span class="icon"><i class="feather-check"></i></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Location-Based Tracking</td>
                                                        <td>
                                                            <span class="icon bg-dark"><i class="feather-x"></i></span>
                                                        </td>
                                                        <td>
                                                            <span class="icon"><i class="feather-check"></i></span>
                                                        </td>
                                                        <td>
                                                            <span class="icon"><i class "feather-check"></i></span>
                                                        </td>
                                                        <td>Advanced</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Real-Time Reporting</td>
                                                        <td>
                                                            <span class="icon bg-dark"><i class="feather-x"></i></span>
                                                        </td>
                                                        <td>
                                                            <span class="icon bg-dark"><i class="feather-x"></i></span>
                                                        </td>
                                                        <td>
                                                            <span class="icon"><i class="feather-check"></i></span>
                                                        </td>
                                                        <td>Advanced Custom</td>
                                                    </tr>

                                                    <!-- Support Section -->
                                                    <th class="heading-row">
                                                        <h6>Support</h6>

                                                    </th>
                                                    <tr>
                                                        <td>Email Support</td>
                                                        <td>Basic</td>
                                                        <td>Priority</td>
                                                        <td>24/7 Priority</td>
                                                        <td>Dedicated Support</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Phone Support</td>
                                                        <td>
                                                            <span class="icon bg-dark"><i class="feather-x"></i></span>
                                                        </td>
                                                        <td>
                                                            <span class="icon bg-dark"><i class="feather-x"></i></span>
                                                        </td>
                                                        <td>
                                                            <span class="icon"><i class="feather-check"></i></span>
                                                        </td>
                                                        <td>Dedicated Line</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Custom Integration Support</td>
                                                        <td>
                                                            <span class="icon bg-dark"><i class="feather-x"></i></span>
                                                        </td>
                                                        <td>
                                                            <span class="icon bg-dark"><i class="feather-x"></i></span>
                                                        </td>
                                                        <td>Available</td>
                                                        <td>Advanced</td>
                                                    </tr>

                                                    <!-- Advanced Features Section -->
                                                    <th class="heading-row">
                                                        <h6>Advanced Features</h6>
                                                    </th>
                                                    <tr>
                                                        <td>Custom Branding</td>
                                                        <td>
                                                            <span class="icon bg-dark"><i class="feather-x"></i></span>
                                                        </td>
                                                        <td>
                                                            <span class="icon"><i class="feather-check"></i></span>
                                                        </td>
                                                        <td>
                                                            <span class="icon"><i class="feather-check"></i></span>
                                                        </td>
                                                        <td>Fully Customizable</td>
                                                    </tr>
                                                    <tr>
                                                        <td>White Labeling</td>
                                                        <td>
                                                            <span class="icon bg-dark"><i class="feather-x"></i></span>
                                                        </td>
                                                        <td>
                                                            <span class="icon bg-dark"><i class="feather-x"></i></span>
                                                        </td>
                                                        <td>
                                                            <span class="icon"><i class="feather-check"></i></span>
                                                        </td>
                                                        <td>Available</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Multi-User Access</td>
                                                        <td>1 User</td>
                                                        <td>Up to 3 Users</td>
                                                        <td>Up to 10 Users</td>
                                                        <td>Unlimited</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Dedicated Account Manager</td>
                                                        <td>
                                                            <span class="icon bg-dark"><i class="feather-x"></i></span>
                                                        </td>
                                                        <td>
                                                            <span class="icon bg-dark"><i class="feather-x"></i></span>
                                                        </td>
                                                        <td>
                                                            <span class="icon"><i class="feather-check"></i></span>
                                                        </td>
                                                        <td>Yes</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            

                        </div>

                    </div>

                </div>
            </div>
        </div>

    </main>
</body>

<?php include '../common/script.php' ?>

</html>