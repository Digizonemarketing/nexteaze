<!DOCTYPE html>
<html lang="en">

<?php
// Include database connection and common header
include 'common/db.php';

$post_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$post = null;

// Fetch the blog post by the ID
if ($post_id > 0) {
    $stmt = $conn->prepare("SELECT id, title, slug, content, image, created_at FROM posts WHERE id = ?");
    $stmt->bind_param("i", $post_id);
    $stmt->execute();
    $post = $stmt->get_result()->fetch_assoc();
    $stmt->close();
}

// Set page title
$title = $post['title'] ?? 'Blog Post';
include 'common/admin-head.php'; ?>
<head>
    <link rel="stylesheet" href="public/css/blog.css">
</head>
<!--<style>-->
<!--    .recent-post-item.mt--15 {-->
<!--        display: flex;-->
<!--        justify-content: space-between;-->
<!--        align-items: center;-->
<!--    }-->

<!--    .post-title, .post-meta {-->
<!--        margin: 0px;-->
<!--    }-->

<!--    ul.recent-posts-list {-->
<!--        padding: 0px;-->
<!--    }-->

<!--    .recent-post-image, .post-thumb {-->
<!--        width: 60px;-->
<!--        height: 60px;-->
<!--        object-fit: cover;-->
<!--        border-radius: var(--radius);-->
<!--    }-->

<!--    .blog-post-image {-->
<!--        width: 100%;-->
<!--        height: 300px;-->
<!--        object-fit: cover;-->
<!--        border-radius: var(--radius);-->
<!--    }-->

<!--    .service {-->
<!--        z-index: 999;-->
<!--    }-->
<!--</style>-->
<body>
    <main class="page-wrapper">
        <?php include 'common/header.php'; ?>
        <?php include 'common/preloader.php'; ?>

        <div class="blog-area rainbow-section-gap">
            <div class="container">
                <div class="row">
                    <!-- Blog Post Content -->
                    <div class="col-lg-9 col-md-8">
                        <?php if ($post): ?>
                            <div class="service bg-color-blackest radius text-left variation-4 bg-flashlight">
                                <img src="<?php echo htmlspecialchars($post['image']); ?>" alt="<?php echo htmlspecialchars($post['title']); ?>" class="blog-post-image">
                                <div class="content mt--25">
                                    <h2 class="title w-600 mb--20"><?php echo htmlspecialchars($post['title']); ?></h2>
                                    <p class="description b1 color-gray mb--0"><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
                                    <p class="post-meta color-gray">Published on: <?php echo date('F j, Y', strtotime($post['created_at'])); ?></p>
                                </div>
                            </div>

                            <!-- Related Posts Section -->
                            <div class="related-posts mt--50">
                                <h4 class="subtitle">Related Posts</h4>
                                <div class="row">
                                    <?php
                                    // Fetch related posts
                                    $related_stmt = $conn->prepare("SELECT id, title, image FROM posts WHERE id != ? ORDER BY RAND() LIMIT 3");
                                    $related_stmt->bind_param("i", $post_id);
                                    $related_stmt->execute();
                                    $related_posts = $related_stmt->get_result();
                                    while ($related_post = $related_posts->fetch_assoc()) {
                                    ?>
                                        <div class="col-lg-4 col-md-6 mt--25">
                                            <div class="service bg-color-blackest radius text-center variation-4 bg-flashlight">
                                                <a href="blog-post.php?id=<?php echo $related_post['id']; ?>">
                                                    <img src="<?php echo htmlspecialchars($related_post['image']); ?>" alt="<?php echo htmlspecialchars($related_post['title']); ?>" class="post-image">
                                                </a>
                                                <div class="content mt--15">
                                                    <h5 class="title">
                                                        <a href="blog-post.php?id=<?php echo $related_post['id']; ?>"><?php echo htmlspecialchars($related_post['title']); ?></a>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                    $related_stmt->close(); ?>
                                </div>
                            </div>
                        <?php else: ?>
                            <p>No post found.</p>
                        <?php endif; ?>
                    </div>

                    <!-- Sidebar -->
                    <div class="col-lg-3 col-md-4">
                        <!-- Recent Posts -->
                        <div class="side-col recent-posts bg-color-blackest radius text-left variation-4 bg-flashlight">
                            <h4 class="subtitle">Recent Posts</h4>
                            <ul class="recent-posts-list">
                                <?php
                                $recent_stmt = $conn->prepare("SELECT id, title, image, created_at FROM posts ORDER BY created_at DESC LIMIT 5");
                                $recent_stmt->execute();
                                $recent_posts = $recent_stmt->get_result();
                                while ($recent_post = $recent_posts->fetch_assoc()) {
                                    $post_title = strlen($recent_post['title']) > 30 ? substr($recent_post['title'], 0, 30) . '...' : $recent_post['title'];
                                ?>
                                    <li class="recent-post-item mt--15">
                                        <a href="blog-post.php?id=<?php echo $recent_post['id']; ?>">
                                            <img src="<?php echo htmlspecialchars($recent_post['image']); ?>" alt="<?php echo htmlspecialchars($recent_post['title']); ?>" class="recent-post-image">
                                        </a>
                                        <div class="post-details">
                                            <a href="blog-post.php?id=<?php echo $recent_post['id']; ?>">
                                                <h6 class="post-title"><?php echo htmlspecialchars($post_title); ?></h6>
                                            </a>
                                            <p class="post-meta"><?php echo date('F j, Y', strtotime($recent_post['created_at'])); ?></p>
                                        </div>
                                    </li>
                                <?php }
                                $recent_stmt->close(); ?>
                            </ul>
                        </div>

                        <!-- Tags Section -->
                        <div class="side-col tags mt--30 bg-color-blackest radius text-center variation-4 bg-flashlight">
                            <h4 class="subtitle">Tags</h4>
                            <div class="tags-list">
                                <?php
                                $tags = ['PHP', 'HTML', 'CSS', 'JavaScript', 'Blog'];
                                foreach ($tags as $tag) {
                                    echo "<a href='#' class='tag-link'>$tag</a> ";
                                }
                                ?>
                            </div>
                        </div>

                        <!-- Comment Form -->
                        <div class="side-col comment-form mt--30 bg-color-blackest radius text-center variation-4 bg-flashlight">
                            <h4 class="subtitle">Leave a Comment</h4>
                            <form action="submit-comment.php" method="POST">
                                <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="comment">Comment</label>
                                    <textarea name="comment" id="comment" class="form-control" rows="5" required></textarea>
                                </div>
                                <button type="submit" class="btn-default bg-solid-primary">Submit Comment</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php include 'common/footer.php'; ?>
        <?php include 'common/copyRight.php'; ?>
    </main>
</body>
</html>
