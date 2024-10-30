<?php
include 'sec.php'; 
include '../common/db.php'; 

$message = '';

// Initialize variables for editing
$title = '';
$content = '';
$status = 'draft';
$scheduled_at = '';
$image = '';
$editMode = false;

// Define allowed MIME types for images
$allowedMimeTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp', 'image/gif'];

// Handle form submission for creating/updating posts
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $scheduled_at = mysqli_real_escape_string($conn, $_POST['scheduled_at']);
    $postId = isset($_POST['id']) ? intval($_POST['id']) : null;

    // Handle image upload
    if (isset($_FILES['blog_image']) && $_FILES['blog_image']['error'] === UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['blog_image']['tmp_name'];
        $imageName = basename($_FILES['blog_image']['name']);
        $imageFullPath = '../public/images/uploads/' . $imageName;
        $imageMimeType = mime_content_type($imageTmpPath);

        if (!in_array($imageMimeType, $allowedMimeTypes)) {
            $message = "Invalid file type. Please upload a JPEG, JPG, PNG, WebP, or GIF image.";
        } else {
            move_uploaded_file($imageTmpPath, $imageFullPath);
        }
    } else {
        $imageFullPath = $_POST['existing_image']; // Keep existing image if not uploaded
    }

    // Create or update post
    if ($postId) {
        // Update existing post
        $sql = "UPDATE posts SET title = ?, content = ?, image = ?, status = ?, scheduled_at = ?, updated_at = NOW() WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'sssssi', $title, $content, $imageFullPath, $status, $scheduled_at, $postId);
        if (mysqli_stmt_execute($stmt)) {
            $message = "Post updated successfully!";
        } else {
            $message = "Error updating post: " . mysqli_error($conn);
        }
    } else {
        // Insert new post
        $slug = strtolower(str_replace(" ", "-", $title));
        $sql = "INSERT INTO posts (title, slug, content, image, created_at, updated_at, status, scheduled_at) 
                VALUES (?, ?, ?, ?, NOW(), NOW(), ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'ssssss', $title, $slug, $content, $imageFullPath, $status, $scheduled_at);
        if (mysqli_stmt_execute($stmt)) {
            $message = "Post created successfully!";
        } else {
            $message = "Error creating post: " . mysqli_error($conn);
        }
    }
    mysqli_stmt_close($stmt);
}

// Handle delete action
if (isset($_GET['delete'])) {
    $postId = intval($_GET['delete']);
    $sql = "DELETE FROM posts WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $postId);
    if (mysqli_stmt_execute($stmt)) {
        $message = "Post deleted successfully!";
    } else {
        $message = "Error deleting post: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
}

// Handle archive action
if (isset($_GET['archive'])) {
    $postId = intval($_GET['archive']);
    $sql = "UPDATE posts SET status = 'archived' WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $postId);
    if (mysqli_stmt_execute($stmt)) {
        $message = "Post archived successfully!";
    } else {
        $message = "Error archiving post: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
}

// Handle edit action
if (isset($_GET['edit'])) {
    $postId = intval($_GET['edit']);
    $sql = "SELECT * FROM posts WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $postId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        $title = $row['title'];
        $content = $row['content'];
        $status = $row['status'];
        $image = $row['image'];
        $scheduled_at = $row['scheduled_at'];
        $editMode = true;
    }
    mysqli_stmt_close($stmt);
}

// Fetch all posts
$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
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
                                    <div class="single-settings-box top-flashlight light-xl">
                                        <h3 class="title mb--30 theme-gradient">
                                            <?php echo $editMode ? 'Edit Post' : 'Publish New Post'; ?>
                                        </h3>

                                        <!-- Display message -->
                                        <?php if (!empty($message)): ?>
                                            <div class="alert alert-warning"><?php echo $message; ?></div>
                                        <?php endif; ?>

                                        <!-- Form for creating/updating post -->
                                        <form action="manage-posts.php" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?php echo $editMode ? $postId : ''; ?>">
                                            <input type="hidden" name="existing_image" value="<?php echo $image; ?>">

                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($title); ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="content">Content</label>
                                                <textarea class="form-control" id="content" name="content" required><?php echo htmlspecialchars($content); ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select id="status" name="status" class="form-control" required>
                                                    <option value="draft" <?php echo $status === 'draft' ? 'selected' : ''; ?>>Draft</option>
                                                    <option value="published" <?php echo $status === 'published' ? 'selected' : ''; ?>>Published</option>
                                                    <option value="archived" <?php echo $status === 'archived' ? 'selected' : ''; ?>>Archived</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="blog_image">Image</label>
                                                <input type="file" class="form-control-file" id="blog_image" name="blog_image">
                                                <?php if ($image): ?>
                                                    <img src="<?php echo $image; ?>" alt="Post Image" style="max-width: 200px;">
                                                <?php endif; ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="scheduled_at">Schedule Date</label>
                                                <input type="date" class="form-control" id="scheduled_at" name="scheduled_at" value="<?php echo htmlspecialchars($scheduled_at); ?>">
                                            </div>

                                            <button type="submit" class="btn btn-primary"><?php echo $editMode ? 'Update Post' : 'Publish Post'; ?></button>
                                        </form>

                                        <!-- Display all posts in a table -->
                                        <h3 class="mt-5">All Posts</h3>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Title</th>
                                                    <th>Status</th>
                                                    <th>Created At</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                                    <tr>
                                                        <td><?php echo $row['id']; ?></td>
                                                        <td><?php echo htmlspecialchars($row['title']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['status']); ?></td>
                                                        <td><?php echo date('Y-m-d', strtotime($row['created_at'])); ?></td>
                                                        <td class="buttons">
                                                            <a href="manage-posts.php?edit=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                                                            <a href="manage-posts.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
                                                            <a href="manage-posts.php?archive=<?php echo $row['id']; ?>" class="btn btn-secondary">Archive</a>
                                                        </td>
                                                    </tr>
                                                <?php endwhile; ?>
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
    </main>
</body>
<style>
    td.buttons {
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    align-content: center;
    justify-content: space-between;
    align-items: center;
    column-gap: 7px;
}
</style>
</html>

<?php mysqli_close($conn); ?>
