<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: signin.php");
    exit();
}

include '../common/db.php';


// Fetch user information based on email
$email = $_SESSION['email'];
$sql = "SELECT id, name, email FROM users WHERE email=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

// Check if form data is set
if (isset($_POST['name']) && isset($_POST['email'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    $userId = $user['id'];

    $sql = "UPDATE users SET name=?, email=?";
    $params = [$name, $email];

    if (!empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql .= ", password=?";
        $params[] = $hashed_password;
    }

    $sql .= " WHERE id=?";
    $params[] = $userId;

    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $types = str_repeat('s', count($params) - 1) . 'i';
        $stmt->bind_param($types, ...$params);

        if ($stmt->execute()) {
            $_SESSION['email'] = $email; // Update session email if it was changed
            header("Location: profile-details.php?update=success");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Details</title>
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
            <div class="rbt-main-content mr--0 mb--0">
                <div class="rbt-daynamic-page-content center-width">
                    <!-- Dashboard Center Content -->
                    <div class="rbt-dashboard-content">
                        <div class="banner-area">
                            <div class="settings-area">
                                <h3 class="title">Profile Details</h3>
                                <ul class="user-nav">
                                    <li><a href="profile-details.php"><span>Profile Details</span></a></li>
                                    <li><a href="notification.php"><span>Notification</span></a></li>
                                    <li><a href="chat-export.php"><span>Chat Export</span></a></li>
                                    <li><a href="appearance.php"><span>Appearance</span></a></li>
                                    <li><a href="plans-billing.php"><span>Plans and Billing</span></a></li>
                                    <li><a href="sessions.php"><span>Sessions</span></a></li>
                                    <li><a href="application.php"><span>Application</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content-page pb--50">
                            <div class="chat-box-list">
                                <!-- ChatenAI Settings Settings -->
                                <div class="single-settings-box profile-details-box top-flashlight light-xl leftside overflow-hidden">
                                    <div class="profile-details-tab">
                                        <div class="tab-content">
                                            <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                <!-- Start Profile Row -->
                                                <form action="profile-details.php" method="post" class="profile-form">
                                                    <div class="form-group">
                                                        <label for="name">Name</label>
                                                        <input id="name" name="name" type="text" value="<?php echo htmlspecialchars($user['name']); ?>" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input id="email" name="email" type="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="password">New Password (Leave blank if not changing)</label>
                                                        <input id="password" name="password" type="password" placeholder="Enter new password">
                                                    </div>

                                                    <div class="form-group">
                                                        <button type="submit" class="btn-submit">Update Info</button>
                                                    </div>
                                                </form>
                                                <!-- End Profile Row -->
                                            </div>

                                            <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                                                <!-- Start Password Row -->
                                                <form action="update_password.php" method="post" class="rbt-profile-row rbt-default-form row row--15">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="currentpassword">Current Password</label>
                                                            <input id="currentpassword" name="current_password" type="password" placeholder="Current Password">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="newpassword">New Password</label>
                                                            <input id="newpassword" name="new_password" type="password" placeholder="New Password">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="retypenewpassword">Re-type New Password</label>
                                                            <input id="retypenewpassword" name="retype_new_password" type="password" placeholder="Re-type New Password">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mt--20">
                                                        <div class="form-group mb--0">
                                                            <button type="submit" class="btn-default">Update Password</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- End Password Row -->
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- End Profile Details -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Main Content -->
        </div>
    </main>
</body>
</html>
