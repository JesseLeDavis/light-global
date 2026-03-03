<?php
session_start();

// Load environment variables
function loadEnv($path) {
    if (!file_exists($path)) {
        return false;
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        // Skip comments
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        // Parse key=value
        if (strpos($line, '=') !== false) {
            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);

            if (!empty($key)) {
                putenv("$key=$value");
                $_ENV[$key] = $value;
            }
        }
    }
    return true;
}

// Load .env file
if (!loadEnv(__DIR__ . '/.env')) {
    die('Error: .env file not found. Please create it from .env.example and add your Stripe keys.');
}

// Get Stripe keys from environment
$stripeSecretKey = getenv('STRIPE_SECRET_KEY');
$stripePublishableKey = getenv('STRIPE_PUBLISHABLE_KEY');
$statementDescriptor = getenv('STRIPE_STATEMENT_DESCRIPTOR') ?: 'LIGHT Global';

if (empty($stripeSecretKey)) {
    die('Error: Stripe secret key not configured. Please add your keys to the .env file.');
}

// Include Stripe PHP library
require_once 'vendor/autoload.php';

// Set your secret key
\Stripe\Stripe::setApiKey($stripeSecretKey);

// Get the amount from POST
$amount = isset($_POST['amount']) ? floatval($_POST['amount']) : 0;

if ($amount < 1) {
    $_SESSION['error'] = 'Invalid donation amount';
    header('Location: /give');
    exit;
}

// Convert to cents (Stripe uses cents)
$amountInCents = intval($amount * 100);

try {
    // Create Checkout Session
    $checkout_session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => 'Donation to LIGHT Global',
                    'description' => 'Supporting transformative mentorship and Kingdom impact',
                ],
                'unit_amount' => $amountInCents,
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/donation-success?session_id={CHECKOUT_SESSION_ID}',
        'cancel_url' => (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/donation-cancelled',
        'payment_intent_data' => [
            'statement_descriptor' => substr($statementDescriptor, 0, 22), // Max 22 characters
        ],
    ]);

    // Redirect to Stripe Checkout
    header('Location: ' . $checkout_session->url);
    exit;

} catch (\Stripe\Exception\ApiErrorException $e) {
    // Handle error
    error_log('Stripe Error: ' . $e->getMessage());
    $_SESSION['error'] = 'Unable to process donation. Please try again.';
    header('Location: /give');
    exit;
}
