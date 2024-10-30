<!DOCTYPE html>
<html lang="en">

<?php 
$title = 'Blog'; 
include 'common/db.php'; 
include 'common/admin-head.php'; 

?>

<body>
    <main class="page-wrapper">
        <?php include 'common/header.php'; ?>
        <?php include 'common/preloader.php'; ?>
        
        <!-- Blog Post Area -->
        <div class="blog-area rainbow-section-gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center" data-sal="slide-up" data-sal-duration="700" data-sal-delay="100">
                            <h4 class="subtitle">
                                <span class="theme-gradient">Latest Articles</span>
                            </h4>
                            <h2 class="title w-600 mb--20">Our Blog</h2>
                        </div>
                    </div>
                </div>

<!--<div class="rainbow-service-area rainbow-section-gap">-->
    <div class="container">
        <div class="row">
            <?php
            $query = "SELECT * FROM posts ORDER BY created_at DESC";
            $result = mysqli_query($conn, $query);
            while ($post = mysqli_fetch_assoc($result)) {
            ?>
                <div class="col-lg-4 col-md-6 mt--25">
                    <div class="service service__style--1 bg-color-blackest radius text-center rbt-border-none variation-4 bg-flashlight">
                        <div class="post-image">
                            <a href="blog-post.php?id=<?php echo $post['id']; ?>">
                                <img src="<?php echo $post['image']; ?>" alt="<?php echo $post['title']; ?>" class="post-image">
                            </a>
                        </div>
                        <div class="content">
                            <h4 class="title w-600">
                                <a href="blog-post.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a>
                            </h4>
                            <p class="description b1 color-gray mb--0">
                                <?php echo substr($post['content'], 0, 150) . '...'; ?>
                            </p>
                            <a href="blog-post.php?id=<?php echo $post['id']; ?>" class="read-more">Read More</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

</div>

            </div>
        </div>

 
        </div>

        <!-- End Call TO Action Area -->

        <!-- Start Footer Area -->
        <?php include 'common/footer.php'; ?>
        <!-- End Footer Area -->

        <!-- Start Copy Right Area -->
        <?php include 'common/copyRight.php'; ?>
        <!-- End Copy Right Area -->

        <div class="rn-progress-parent">
            <svg class="rn-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
            </svg>
        </div>
    </main>
</body>

</html>
