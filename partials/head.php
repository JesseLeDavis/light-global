<?php
// SEO Variables - Set defaults if not defined by page
$page_title = isset($page_title) ? $page_title : 'LIGHT Global - Transformative Mentorship for Kingdom Impact';
$page_description = isset($page_description) ? $page_description : 'Equipping high-achieving leaders to expand their Kingdom impact through transformative mentorship. Impacting Gateway Cities across the world.';
$page_url = (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$page_image = isset($page_image) ? $page_image : (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/assets/images/largelogo.png';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Primary Meta Tags -->
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <meta name="title" content="<?php echo htmlspecialchars($page_title); ?>" />
    <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>" />
    <meta name="keywords" content="mentorship, kingdom impact, leadership development, nonprofit, transformative mentorship, gateway cities, Darren C Davis" />
    <meta name="author" content="LIGHT Global" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo htmlspecialchars($page_url); ?>" />
    <meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>" />
    <meta property="og:description" content="<?php echo htmlspecialchars($page_description); ?>" />
    <meta property="og:image" content="<?php echo htmlspecialchars($page_image); ?>" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="<?php echo htmlspecialchars($page_url); ?>" />
    <meta property="twitter:title" content="<?php echo htmlspecialchars($page_title); ?>" />
    <meta property="twitter:description" content="<?php echo htmlspecialchars($page_description); ?>" />
    <meta property="twitter:image" content="<?php echo htmlspecialchars($page_image); ?>" />

    <!-- Canonical URL -->
    <link rel="canonical" href="<?php echo htmlspecialchars($page_url); ?>" />

    <!-- Favicon -->
    <link rel="icon" href="assets/images/favicon.ico" sizes="any">
    <link rel="icon" href="assets/images/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="assets/images/apple-touch-icon.png">

    <meta name="theme-color" content="#3D8ACA">

    <!-- Main CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalise.css">
    <link rel="stylesheet" href="css/properties.css">
    <link rel="stylesheet" href="css/style.css" />

    <!-- Tiny-slider -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>
<body>