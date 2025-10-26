<?php
// Test email script to debug SMTP issues

require_once 'phpmailer/src/Exception.php';
require_once 'phpmailer/src/PHPMailer.php';
require_once 'phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// SMTP Configuration
$smtp_host = 'smtp.hostinger.com';
$smtp_port = 465;
$smtp_username = 'noreply@bitglow.tech';
$smtp_password = 'Hiddenhollowman1@';

echo "<h2>Testing SMTP Connection</h2>\n";

$mail = new PHPMailer(true);

try {
    // Enable verbose debug output
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = $smtp_host;
    $mail->SMTPAuth = true;
    $mail->Username = $smtp_username;
    $mail->Password = $smtp_password;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = $smtp_port;

    // Recipients
    $mail->setFrom($smtp_username, 'Test Email');
    $mail->addAddress('jesseld24@gmail.com');

    // Content
    $mail->isHTML(false);
    $mail->Subject = 'SMTP Test Email';
    $mail->Body = 'This is a test email to verify SMTP configuration.';

    $mail->send();
    echo "<p style='color: green;'>Email sent successfully!</p>";
    
} catch (Exception $e) {
    echo "<p style='color: red;'>Email failed: " . $mail->ErrorInfo . "</p>";
    echo "<p>Exception: " . $e->getMessage() . "</p>";
}
?>