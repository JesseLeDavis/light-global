<?php
$page_title = 'Donation Received — Thank You | LIGHT Global';
$page_description = 'Your donation to LIGHT Global was successful. Thank you for partnering with us to equip leaders and transform communities worldwide.';
include('partials/head.php'); ?>
<?php include('partials/header.php'); ?>

    <main class="donation-result-page">
        <section class="result-container success">
            <div class="result-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <h1>Thank You for Your Generosity!</h1>
            <p class="result-message">
                Your donation has been successfully processed. You should receive a receipt via email shortly.
            </p>
            <p>
                Your support enables LIGHT Global to continue equipping leaders, impacting cities, and advancing the Kingdom through transformative mentorship. We are deeply grateful for your partnership in this mission.
            </p>
            <div class="result-actions">
                <a href="/" class="btn-large btn-light-blue hover">Return Home</a>
                <a href="/mission" class="btn-large btn-white hover">Learn More About Our Mission</a>
            </div>
        </section>
    </main>

<?php include('partials/footer.php'); ?>
