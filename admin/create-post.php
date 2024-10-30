<?php
include 'sec.php';
include '../common/db.php';

$message = ''; // Initialize message for displaying errors/success
$content = '';
$status = 'draft'; // Set default status to 'draft'
$allowedMimeTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp', 'image/gif'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $uploadDir = '../public/images/uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (isset($_FILES['blog_image']) && $_FILES['blog_image']['error'] === UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['blog_image']['tmp_name'];
        $imageName = basename($_FILES['blog_image']['name']);
        $imageFullPath = $uploadDir . $imageName;

        $imageMimeType = mime_content_type($imageTmpPath);
        if (!in_array($imageMimeType, $allowedMimeTypes)) {
            $message = "Invalid file type. Please upload a JPEG, JPG, PNG, WebP, or GIF image.";
        } else {
            if (move_uploaded_file($imageTmpPath, $imageFullPath)) {
                $slug = strtolower(str_replace(" ", "-", $title));
                $baseSlug = $slug;
                $counter = 1;
                while (true) {
                    $checkSlugQuery = "SELECT COUNT(*) FROM posts WHERE slug = ?";
                    $stmtCheck = mysqli_prepare($conn, $checkSlugQuery);
                    mysqli_stmt_bind_param($stmtCheck, 's', $slug);
                    mysqli_stmt_execute($stmtCheck);
                    mysqli_stmt_bind_result($stmtCheck, $count);
                    mysqli_stmt_fetch($stmtCheck);
                    mysqli_stmt_close($stmtCheck);
                    if ($count > 0) {
                        $slug = $baseSlug . '-' . $counter;
                        $counter++;
                    } else {
                        break;
                    }
                }

                $sql = "INSERT INTO posts (title, slug, content, image, created_at, updated_at, status) 
                        VALUES (?, ?, ?, ?, NOW(), NOW(), ?)";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, 'sssss', $title, $slug, $content, $imageFullPath, $status);

                if (mysqli_stmt_execute($stmt)) {
                    $message = "Blog post published successfully!";
                } else {
                    $message = "Error: " . mysqli_error($conn);
                }
                mysqli_stmt_close($stmt);
            } else {
                $message = "Error uploading the image.";
            }
        }
    } else {
        $message = isset($_FILES['blog_image']) ? "Please upload a valid image." : "No file was uploaded.";
    }

    mysqli_close($conn);
}

$statuses = ['draft', 'published', 'archived'];
?>

<!DOCTYPE html>
<html lang="en">
<?php $title = 'Publish Blog'; ?>
<?php include '../common/admin-head.php'; ?>

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
                                        <h3 class="title mb--30 theme-gradient">Publish New Blog Post</h3>

                                        <?php if (!empty($message)): ?>
                                            <div class="alert alert-warning"><?php echo $message; ?></div>
                                        <?php endif; ?>

                                        <form action="" method="POST" enctype="multipart/form-data" class="rbt-profile-row rbt-default-form row row--15">
                                            <div class="form-group col-lg-12">
                                                <label for="title">Blog Title</label>
                                                <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($title); ?>" placeholder="Enter blog title" required>
                                            </div>

                                            <!-- Custom SEO-friendly Quill editor -->
                                            <div class="form-group col-lg-12">
                                                <label for="content">Content</label>
                                                <div id="editor-toolbar">
                                                    <button type="button" class="ql-bold">B</button>
                                                    <button type="button" class="ql-italic">I</button>
                                                    <button type="button" class="ql-underline">U</button>
                                                    <select class="ql-color"></select>
                                                    <select class="ql-header">
                                                        <option value="1">H1</option>
                                                        <option value="2">H2</option>
                                                        <option value="3">H3</option>
                                                        <option selected>Normal</option>
                                                    </select>
                                                    <button type="button" class="ql-link">Link</button>
                                                    <button type="button" class="ql-image">Image</button>
                                                    <button type="button" class="ql-video">Video</button>
                                                    <button type="button" class="ql-clean">Clear Formatting</button>
                                                </div>
                                                <div id="editor-container" style="border:1px solid #ddd; padding:10px; min-height:200px;"></div>
                                                <input type="hidden" id="content" name="content">
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label for="status">Status</label>
                                                <select id="status" name="status" class="form-control" required>
                                                    <?php foreach ($statuses as $status_option): ?>
                                                        <option value="<?php echo htmlspecialchars($status_option); ?>" <?php echo $status === $status_option ? 'selected' : ''; ?>>
                                                            <?php echo htmlspecialchars($status_option); ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="blog_image">Blog Image</label>
                                                <input type="file" class="form-control-file" id="blog_image" name="blog_image" required>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <button type="submit" class="btn-default bg-gradient-secondary">Publish Blog</button>
                                            </div>
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



    <?php include '../common/script.php'; ?>
</body>
</html>
