<?php
// Simple SMTP Connection Test
// DELETE THIS FILE AFTER TESTING!

require_once 'phpmailer/src/Exception.php';
require_once 'phpmailer/src/PHPMailer.php';
require_once 'phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;

// Load .env
$envFile = __DIR__ . '/.env';
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        if (strpos($line, '=') === false) continue;
        list($name, $value) = explode('=', $line, 2);
        $_ENV[trim($name)] = trim($value);
    }
}

echo "<h1>SMTP Connection Test</h1>";
echo "<pre>";

echo "=== Configuration ===\n";
echo "SMTP Host: " . ($_ENV['SMTP_HOST'] ?? 'NOT SET') . "\n";
echo "SMTP Port: " . ($_ENV['SMTP_PORT'] ?? 'NOT SET') . "\n";
echo "SMTP Username: " . ($_ENV['SMTP_USERNAME'] ?? 'NOT SET') . "\n";
echo "SMTP Password: " . (isset($_ENV['SMTP_PASSWORD']) ? str_repeat('*', strlen($_ENV['SMTP_PASSWORD'])) : 'NOT SET') . "\n";
echo "\n";

if (empty($_ENV['SMTP_USERNAME']) || empty($_ENV['SMTP_PASSWORD'])) {
    echo "❌ ERROR: SMTP credentials not found in .env file!\n";
    exit;
}

echo "=== Testing SMTP Connection ===\n\n";

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = 2; // Detailed debug output
    $mail->isSMTP();
    $mail->Host = $_ENV['SMTP_HOST'];
    $mail->SMTPAuth = true;
    $mail->Username = $_ENV['SMTP_USERNAME'];
    $mail->Password = $_ENV['SMTP_PASSWORD'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = $_ENV['SMTP_PORT'];

    // Recipients
    $mail->setFrom($_ENV['SMTP_USERNAME'], 'SMTP Test');
    $mail->addAddress('DCD@thelightglobal.com', 'Test Recipient');

    // Content
    $mail->isHTML(false);
    $mail->Subject = 'SMTP Test - ' . date('Y-m-d H:i:s');
    $mail->Body = "This is a test email to verify SMTP is working correctly.\n\nIf you receive this, your email configuration is working!";

    $mail->send();

    echo "\n\n✅ SUCCESS! Email sent successfully!\n";
    echo "Check DCD@thelightglobal.com inbox for the test email.\n";

} catch (Exception $e) {
    echo "\n\n❌ FAILED! Email could not be sent.\n";
    echo "Error: {$mail->ErrorInfo}\n\n";

    echo "=== Common Solutions ===\n";
    echo "1. Email account doesn't exist - Create noreply@thelightglobal.com in Hostinger\n";
    echo "2. Wrong password - Check password in Hostinger email settings\n";
    echo "3. Try port 587 instead of 465\n";
    echo "4. Check if SMTP is enabled for this email account in Hostinger\n";
}

echo "</pre>";

echo "<hr>";
echo "<p><strong>⚠️ IMPORTANT: Delete this file after testing for security!</strong></p>";
echo "<p>Run: <code>rm test-smtp.php</code></p>";
?>
