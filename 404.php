<?php
http_response_code(404);
$page_title = 'Page Not Found | LIGHT Global';
$page_description = 'The page you are looking for could not be found.';
include('partials/head.php');
?>
<?php include('partials/header.php'); ?>

    <main class="donation-result-page">
        <section class="result-container">
            <div class="result-icon">
                <i class="fas fa-search"></i>
            </div>
            <h1>Page Not Found</h1>
            <p class="result-message">
                Sorry, the page you're looking for doesn't exist or has been moved.
            </p>
            <div class="result-actions">
                <a href="/" class="btn-large btn-light-blue hover">Return Home</a>
                <a href="/contact" class="btn-large btn-white hover">Contact Us</a>
            </div>
        </section>
    </main>

<?php include('partials/footer.php'); ?>
