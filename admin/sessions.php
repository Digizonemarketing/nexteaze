<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Include other CSS files as needed -->
    <?php include '../common/admin-head.php'; ?>
</head>

<body>
    <?php
session_start();

// Set session timeout duration (in seconds)
$session_timeout_duration = 1800; // 30 minutes

// Check if the session variable for the last activity time is set
if (isset($_SESSION['last_activity'])) {
    // Calculate the session's age
    $session_age = time() - $_SESSION['last_activity'];
    
    // If the session is older than the timeout duration, destroy it
    if ($session_age > $session_timeout_duration) {
        session_unset(); // Unset session variables
        session_destroy(); // Destroy the session
        header("Location: /signin"); // Redirect to login page
        exit;
    }
}

// Update the last activity time
$_SESSION['last_activity'] = time();

 include '../common/db.php';


    // Fetch user email from session
    $user = $_SESSION['email'];

    // Handle session removal
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['session_id'])) {
        $session_id = $_POST['session_id'];

        // Remove the specific session
        $deleteSession = $conn->prepare("DELETE FROM user_sessions WHERE session_id = ?");
        $deleteSession->bind_param("i", $session_id);
        $deleteSession->execute();
        $deleteSession->close();
    }

    // Handle sign out from all devices
    if (isset($_GET['signout_all'])) {
        // Remove all sessions for this user
        $deleteSessions = $conn->prepare("DELETE FROM user_sessions WHERE email = ?");
        $deleteSessions->bind_param("s", $user);
        $deleteSessions->execute();
        $deleteSessions->close();

        // Destroy the session and log the user out
        session_destroy();
        header("Location: signin.php");
        exit();
    }

    // Fetch sessions for the logged-in user
    $sessionsQuery = $conn->prepare("SELECT * FROM user_sessions WHERE email = ?");
    $sessionsQuery->bind_param("s", $user);
    $sessionsQuery->execute();
    $sessionsResult = $sessionsQuery->get_result();
    $sessions = [];
    while ($row = $sessionsResult->fetch_assoc()) {
        $sessions[] = $row;
    }
    $sessionsQuery->close();

    // Close connection
    $conn->close();
    ?>

    <main class="page-wrapper rbt-dashboard-page">
        <div class="rbt-panel-wrapper">

            <?php include '../common/header.php'; ?>
            <?php include '../common/mobilemenu.php'; ?>
            <?php include '../common/Leftpanel.php'; ?>

            <!-- Main content -->
            <div class="rbt-main-content mb--0 mr--0">
                <div class="rbt-daynamic-page-content center-width">

                    <!-- Dashboard Center Content -->
                    <div class="rbt-dashboard-content">
                        <div class="banner-area">
                            <!-- ChatenAI small Slider -->
                            <?php include '../common/setting-bar.php'; ?>
                        </div>

                        <div class="content-page pb--50">
                            <div class="chat-box-list">

                                <!-- ChatenAI Notification Section -->
                                <div class="single-settings-box sessions-box top-flashlight light-xl leftside overflow-hidden">
                                    <div class="section-title">
                                        <h4 class="title mb--0">Your Sessions</h4>
                                        <p class="description">Terminate any unauthorized sessions from the roster of devices accessing your account.</p>
                                    </div>
                                    <div class="rbt-sm-separator mt-0"></div>

                                    <div class="list-card-grp">
                                        <?php if (empty($sessions)) : ?>
                                            <p>No active sessions found.</p>
                                        <?php else: ?>
                                            <?php foreach ($sessions as $session) : ?>
                                                <div class="list-card">
                                                    <div class="inner">
                                                        <div class="left-content">
                                                            <div class="img-section">
                                                                <?php
                                                                $browser = strtolower($session['browser']);
                                                                $iconClass = '';
                                                                
                                                                // Set the icon class based on the browser
                                                                if (strpos($browser, 'chrome') !== false) {
                                                                    $iconClass = 'fab fa-chrome';
                                                                } elseif (strpos($browser, 'firefox') !== false) {
                                                                    $iconClass = 'fab fa-firefox';
                                                                } elseif (strpos($browser, 'safari') !== false) {
                                                                    $iconClass = 'fab fa-safari';
                                                                } elseif (strpos($browser, 'edge') !== false) {
                                                                    $iconClass = 'fab fa-edge';
                                                                } elseif (strpos($browser, 'opera') !== false) {
                                                                    $iconClass = 'fab fa-opera';
                                                                } else {
                                                                    $iconClass = 'fas fa-globe'; // Default icon
                                                                }
                                                                ?>

                                                                <i class="<?php echo $iconClass; ?>" style="font-size: 30px;"></i>
                                                            </div>
                                                            <div class="content-section">
                                                                <h6 class="title"><?php echo htmlspecialchars($session['browser']); ?> on <?php echo htmlspecialchars($session['device']); ?></h6>
                                                                <p class="desc"><?php echo htmlspecialchars($session['ip_address']); ?></p>
                                                                <p class="date">Signed in <?php echo htmlspecialchars(date('M d, Y', strtotime($session['sign_in_date']))); ?></p>
                                                            </div>
                                                        </div>

                                                        <div class="right-content">
                                                            <form action="" method="POST" style="display:inline;">
                                                                <input type="hidden" name="session_id" value="<?php echo htmlspecialchars($session['session_id']); ?>">
                                                                <button type="submit" class="btn-default btn-border">
                                                                    <i class="feather-trash-2"></i> Remove
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>

                                        <div class="btn-group mt--20">
                                            <a class="btn-default" href="?signout_all=true"><i class="feather-log-out"></i> Sign out All devices</a>
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

</html>
