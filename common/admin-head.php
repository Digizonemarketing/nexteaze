<?php
// Allow styles from specific sources
header("Content-Security-Policy: 
    style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdnjs.cloudflare.com https://cdn.jsdelivr.net;
    script-src 'self' https://static.elfsight.com 'unsafe-inline' https://cdn.quilljs.com;
    font-src 'self' https://nexteaze.digizonesolutions.com;
");
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-style-mode" content="1"> <!-- 0 == light, 1 == dark -->
<meta http-equiv="Content-Security-Policy" content="
  default-src 'self'; 
  style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdnjs.cloudflare.com; 
  font-src 'self' https://fonts.gstatic.com; 
  script-src 'self' https://static.elfsight.com 'unsafe-inline'; 
  img-src 'self' data: https://static.elfsight.com;">




    
    <title><?php echo htmlspecialchars($title); ?> || Simplifying Product Verification</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/public/images/logo/fav.png">

    <!-- CSS Files (Optimized and Minimized) -->
    <link rel="stylesheet" href="/public/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/plugins/animation.css">
    <link rel="stylesheet" href="/public/css/plugins/feature.css">
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/admin.css">
    
    <link rel="stylesheet" href="assets/css/summernote-bs4.min.css">


    <!-- External Libraries CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-bs4.min.css">




</head>
