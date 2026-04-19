<?php
session_start();
require_once 'vendor/autoload.php';

$envFile = __DIR__ . '/.env';
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        if (strpos($line, '=') !== false) {
            list($key, $value) = explode('=', $line, 2);
            putenv(trim($key) . '=' . trim($value));
        }
    }
}

$verified = false;
$session_id = $_GET['session_id'] ?? '';
if ($session_id) {
    try {
        \Stripe\Stripe::setApiKey(getenv('STRIPE_SECRET_KEY'));
        $session = \Stripe\Checkout\Session::retrieve($session_id);
        $verified = ($session->payment_status === 'paid');
    } catch (\Exception $e) {
        error_log('Stripe verification error: ' . $e->getMessage());
    }
}

$page_title = 'Donation Received — Thank You | LIGHT Global';
$page_description = 'Your donation to LIGHT Global was successful. Thank you for partnering with us to equip leaders and transform communities worldwide.';
include('partials/head.php'); ?>
<?php include('partials/header.php'); ?>

    <main class="donation-result-page">
<?php if ($verified): ?>
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
<?php else: ?>
        <section class="result-container">
            <div class="result-icon">
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <h1>We Couldn't Verify Your Donation</h1>
            <p class="result-message">
                We were unable to confirm your payment. If you believe this is an error, please contact us at
                <a href="mailto:info@thelightglobal.com">info@thelightglobal.com</a>.
            </p>
            <div class="result-actions">
                <a href="/give" class="btn-large btn-light-blue hover">Try Again</a>
                <a href="/" class="btn-large btn-white hover">Return Home</a>
            </div>
        </section>
<?php endif; ?>
    </main>

<?php include('partials/footer.php'); ?>
