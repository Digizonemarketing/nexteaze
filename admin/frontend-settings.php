<?php  include 'sec.php' ?>

<?php


include '../common/db.php';

// Initialize variables
$form_title = $field_label = $verify_button_text = $scan_button_text = $button_color = $hover_color = $text_color = $label_color = $field_color = $gradient_type = $gradient_colors = $angle = $form_image = $generated_by = "";

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_SESSION['email'];

    // Sanitize and validate input
    $form_title = !empty($_POST['formTitle']) ? htmlspecialchars($_POST['formTitle']) : '';
    $field_label = !empty($_POST['fieldLabel']) ? htmlspecialchars($_POST['fieldLabel']) : '';
    $verify_button_text = !empty($_POST['verifyButton']) ? htmlspecialchars($_POST['verifyButton']) : '';
    $scan_button_text = !empty($_POST['scanButton']) ? htmlspecialchars($_POST['scanButton']) : '';
    $button_color = !empty($_POST['buttonColor']) ? htmlspecialchars($_POST['buttonColor']) : '';
    $hover_color = !empty($_POST['hoverColor']) ? htmlspecialchars($_POST['hoverColor']) : '';
    $text_color = !empty($_POST['textColor']) ? htmlspecialchars($_POST['textColor']) : '';
    $label_color = !empty($_POST['labelColor']) ? htmlspecialchars($_POST['labelColor']) : '';
    $field_color = !empty($_POST['fieldColor']) ? htmlspecialchars($_POST['fieldColor']) : '';
    $gradient_type = !empty($_POST['gradientType']) ? htmlspecialchars($_POST['gradientType']) : '';
    $gradient_colors = !empty($_POST['gradientColors']) ? htmlspecialchars($_POST['gradientColors']) : '';
    $angle = isset($_POST['angle']) ? intval($_POST['angle']) : 90;

    $generated_by = $user;

    // Handle image upload
    if (isset($_FILES['formImage']) && $_FILES['formImage']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'Uploads/'; // Absolute path to the upload directory
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true); // Create the directory if it doesn't exist
        }
        $tmp_name = $_FILES['formImage']['tmp_name'];
        $form_image = $upload_dir . basename($_FILES['formImage']['name']);
        if (!move_uploaded_file($tmp_name, $form_image)) {
            echo "Failed to move uploaded file.";
            exit;
        }
    }

    // Prepare and bind the SQL statement
    $sql = "INSERT INTO form_settings (
                form_title, field_label, verify_button_text, scan_button_text, 
                button_color, hover_color, text_color, label_color, field_color,
                gradient_type, gradient_colors, angle, form_image, generated_by
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param(
            "ssssssssssssss",
            $form_title,
            $field_label,
            $verify_button_text,
            $scan_button_text,
            $button_color,
            $hover_color,
            $text_color,
            $label_color,
            $field_color,
            $gradient_type,
            $gradient_colors,
            $angle,
            $form_image,
            $generated_by
        );

        if ($stmt->execute()) {
            // Redirect to a success page or back to the form page
            header("Location: frontend-settings.php"); // Replace with your success page
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<?php $title = 'Front End Settings'; ?>
<?php include '../common/admin-head.php'; ?>

<style>
    /* Your existing styles */
</style>

<body>
    <main class="page-wrapper rbt-dashboard-page">
        <div class="rbt-panel-wrapper">

            <?php include '../common/header.php'; ?>
            <?php include '../common/mobilemenu.php'; ?>
            <?php include '../common/Leftpanel.php'; ?>

            <div class="rbt-main-content mb--0 mr--0">
                <div class="rbt-daynamic-page-content center-width">

                    <div class="rbt-dashboard-content">
                        
                        <div class="content-page pb--50">
                            <div class="chat-box-list">
                                <div class="content">

                                    <div class="single-settings-box contact-box top-flashlight light-xl leftside overflow-hidden">
                                        <h3 class="title mb--30 theme-gradient">Frontend verification Settings</h3>
                                        <form action="frontend-settings" class="rbt-profile-row rbt-default-form row row--15" method="POST" enctype="multipart/form-data">
                                            <!-- Gradient Type -->

                                            
                                            <div class="outer1">
                                                <!-- Gradient Controls -->
                                                <div class="controls">
                                                    <div class="color-stops">
                                                        <div class="gradient-type-picker">
                                                <label for="gradientType">Gradient Type:</label>
                                                <select id="gradientType" name="gradientType" class="form-control">
                                                    <option value="linear">Linear</option>
                                                    <option value="radial">Radial</option>
                                                    <option value="conic">Conic</option>
                                                </select>
                                            </div>
                                                        <label>Gradient Colors:</label>
                                                        <div id="colorStopsContainer">
                                                            <div class="color-stop">
                                                                <input type="color" class="color-stop-picker" value="#12B5DE">
                                                                <input type="number" class="color-stop-position" value="0" min="0" max="100">
                                                                <input type="number" class="color-stop-opacity" value="100" min="0" max="100">
                                                                <span>Opacity</span>
                                                                <button type="button" class="btn btn-danger btn-sm remove-stop">Remove</button>
                                                            </div>
                                                            <div class="color-stop">
                                                                <input type="color" class="color-stop-picker" value="#FF3BD4">
                                                                <input type="number" class="color-stop-position" value="100" min="0" max="100">
                                                                <input type="number" class="color-stop-opacity" value="100" min="0" max="100">
                                                                <span>Opacity</span>
                                                                <button type="button" class="btn btn-primary btn-sm add-stop">Add Color</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="angle-picker">
                                                        <label for="angle">Angle (for Linear Gradient):</label>
                                                        <input type="range" id="angle" name="angle" min="0" max="360" value="90">
                                                        <span id="angleValue">90°</span>
                                                    </div>
                                                </div>

                                                <div class="controls-preview">
                                                    <div id="gradientPreview"></div>

                                                    <div class="output">
                                                        <label for="cssOutput">Generated CSS:</label>
                                                        <textarea id="cssOutput" name="gradientColors" readonly></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Form Customization Fields -->
                                            <div class="form-group">
                                                <label for="formTitle">Title</label>
                                                <input type="text" class="form-control" id="formTitle" name="formTitle" placeholder="Enter Form Title" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="fieldLabel">Field Label or Placeholder</label>
                                                <input type="text" class="form-control" id="fieldLabel" name="fieldLabel" placeholder="Enter field label or placeholder" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="verifyButton">Verify Button Text</label>
                                                <input type="text" class="form-control" id="verifyButton" name="verifyButton" placeholder="Enter text for Verify Button" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="scanButton">Scan to Enter Code Button Text</label>
                                                <input type="text" class="form-control" id="scanButton" name="scanButton" placeholder="Enter text for Scan Button" required>
                                            </div>

                                            <div class="in_row">
                                                <div class="form-group">
                                                    <label for="buttonColor">Button Color</label>
                                                    <input type="color" class="color-stop-picker" id="buttonColor" name="buttonColor" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="hoverColor">Button Hover Color</label>
                                                    <input type="color" class="color-stop-picker" id="hoverColor" name="hoverColor" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="titleColor">Title Color</label>
                                                    <input type="color" class="color-stop-picker" id="titleColor" name="titleColor" required>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="textColor">Text Color</label>
                                                    <input type="color" class="color-stop-picker" id="textColor" name="textColor" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="labelColor">Label Color</label>
                                                    <input type="color" class="color-stop-picker" id="labelColor" name="labelColor" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="fieldColor">Form Fields Color</label>
                                                    <input type="color" class="color-stop-picker" id="fieldColor" name="fieldColor" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="formImage">Upload Image</label>
                                                <input type="file" class="form-control-file " id="formImage" name="formImage" required>
                                            </div>

                                            <button type="submit" class="btn-default bg-gradient-secondary">Save Settings</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </main>


    <?php include '../common/script.php' ?>

</body>

</html>