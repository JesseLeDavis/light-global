<?php
$page_title = 'Donation Cancelled | LIGHT Global';
$page_description = 'Your donation was not completed. No charges were made. Return to the Give page whenever you\'re ready — we\'d love your support.';
include('partials/head.php'); ?>
<?php include('partials/header.php'); ?>

    <main class="donation-result-page">
        <section class="result-container cancelled">
            <div class="result-icon">
                <i class="fas fa-times-circle"></i>
            </div>
            <h1>Donation Cancelled</h1>
            <p class="result-message">
                Your donation was not completed. No charges have been made to your account.
            </p>
            <p>
                If you experienced any issues or have questions, please feel free to contact us. We're here to help!
            </p>
            <div class="result-actions">
                <a href="/give" class="btn-large btn-light-blue hover">Try Again</a>
                <a href="/contact" class="btn-large btn-white hover">Contact Us</a>
            </div>
        </section>
    </main>

<?php include('partials/footer.php'); ?>
