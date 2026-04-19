<?php
// send.php — processes the form and emails results

require_once 'phpmailer/src/Exception.php';
require_once 'phpmailer/src/PHPMailer.php';
require_once 'phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load environment variables
$envFile = __DIR__ . '/.env';
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        list($name, $value) = explode('=', $line, 2);
        $_ENV[trim($name)] = trim($value);
    }
}

session_start();

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Content-Type: application/json");
    echo json_encode(["success" => false, "error" => "Invalid request method"]);
    exit;
}

// CSRF verification
if (empty($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'] ?? '', $_POST['csrf_token'])) {
    header("Content-Type: application/json");
    echo json_encode(["success" => false, "error" => "Invalid form submission. Please reload the page and try again."]);
    exit;
}

// Validate required fields - handle both space and underscore versions
$required_fields = [
    'Contact Name' => 'Contact_Name',
    'Email' => 'Email', 
    'Cell Phone' => 'Cell_Phone',
    'Speaking Address Location' => 'Speaking_Address_Location',
    'Type of Event' => 'Type_of_Event',
    'Event Start Date' => 'Event_Start_Date',
    'Number of Speaking Sessions' => 'Number_of_Speaking_Sessions',
    'Specific Topics' => 'Specific_Topics'
];

foreach ($required_fields as $display_name => $field_name) {
    if (empty($_POST[$field_name]) && empty($_POST[$display_name])) {
        header("Content-Type: application/json");
        echo json_encode(["success" => false, "error" => "Required field missing: $display_name"]);
        exit;
    }
}

// SMTP Configuration - loaded from .env file
$smtp_host = $_ENV['SMTP_HOST'] ?? 'smtp.gmail.com';
$smtp_port = $_ENV['SMTP_PORT'] ?? 587;
$smtp_username = $_ENV['SMTP_USERNAME'] ?? '';
$smtp_password = $_ENV['SMTP_PASSWORD'] ?? '';

$to = "DCD@thelightglobal.com";
$subject = "Speaking Request Submission - " . clean(getField('Contact Name', 'Contact_Name'));

// Sanitize inputs
function clean($v) {
    return trim(filter_var($v, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
}

// Helper function to get field value from either format
function getField($space_name, $underscore_name) {
    return $_POST[$underscore_name] ?? $_POST[$space_name] ?? '';
}

// Build email body
$body = "New Speaking Request Submission:\n\n";
$body .= "CONTACT INFORMATION:\n";
$body .= "Name: " . clean(getField('Contact Name', 'Contact_Name')) . "\n";
$body .= "Organization: " . clean(getField('Contact Organization', 'Contact_Organization') ?: 'Not provided') . "\n";
$body .= "Email: " . clean(getField('Email', 'Email')) . "\n";
$body .= "Phone: " . clean(getField('Cell Phone', 'Cell_Phone')) . "\n\n";

$body .= "EVENT DETAILS:\n";
$body .= "Location: " . clean(getField('Speaking Address Location', 'Speaking_Address_Location')) . "\n";
$body .= "Event Type: " . clean(getField('Type of Event', 'Type_of_Event')) . "\n";
$body .= "Start Date: " . clean(getField('Event Start Date', 'Event_Start_Date')) . "\n";
$body .= "End Date: " . clean(getField('Event End Date', 'Event_End_Date') ?: 'Not provided') . "\n";
$body .= "Number of Sessions: " . clean(getField('Number of Speaking Sessions', 'Number_of_Speaking_Sessions')) . "\n";
$body .= "Expected Attendance: " . clean(getField('Expected Attendance', 'Expected_Attendance') ?: 'Not provided') . "\n";
$body .= "Topics: " . clean(getField('Specific Topics', 'Specific_Topics')) . "\n";
$body .= "Target Audience: " . clean(getField('Target Audience', 'Target_Audience') ?: 'Not provided') . "\n\n";

$body .= "ADDITIONAL DETAILS:\n";
$body .= "Speaker Attire: " . clean(getField('Speaker Attire', 'Speaker_Attire') ?: 'Not specified') . "\n";

// Handle microphone options
$mic_options = $_POST['Microphone_Options'] ?? $_POST['Microphone Options'] ?? null;
if (isset($mic_options) && is_array($mic_options)) {
    $body .= "Microphone Options: " . implode(", ", array_map('clean', $mic_options)) . "\n";
} else {
    $body .= "Microphone Options: Not specified\n";
}

$body .= "Media Capabilities: " . clean(getField('Media Capabilities', 'Media_Capabilities') ?: 'Not specified') . "\n";
$body .= "Media Details: " . clean(getField('Media Details', 'Media_Details') ?: 'Not provided') . "\n";
$body .= "Organization Social Media: " . clean(getField('Organization Social Media Handle', 'Organization_Social_Media_Handle') ?: 'Not provided') . "\n";
$body .= "How they heard about Darren: " . clean(getField('How did you hear about Darren C Davis?', 'How_did_you_hear_about_Darren_C_Davis?') ?: 'Not provided') . "\n\n";

$body .= "Submitted on: " . date('Y-m-d H:i:s') . "\n";

// Create PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = $smtp_host;
    $mail->SMTPAuth = true;
    $mail->Username = $smtp_username;
    $mail->Password = $smtp_password;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = $smtp_port;
    
    // Enable debugging for troubleshooting (remove in production)
    $mail->SMTPDebug = 0; // Set to 2 for detailed debugging

    // Recipients
    $mail->setFrom($smtp_username, 'Speaking Request Form');
    $mail->addAddress($to);
    $mail->addReplyTo(clean(getField('Email', 'Email')), clean(getField('Contact Name', 'Contact_Name')));

    // Content
    $mail->isHTML(false);
    $mail->Subject = $subject;
    $mail->Body = $body;

    // Send email
    $mail->send();
    $success = true;
    $message = "Email sent successfully";
    
} catch (Exception $e) {
    $success = false;
    $message = "There was an issue sending your request. Please try again or contact us directly.";
    error_log("PHPMailer Error: " . $mail->ErrorInfo);
    error_log("Exception: " . $e->getMessage());
}

// Return JSON response
header("Content-Type: application/json");
echo json_encode([
    "success" => $success,
    "message" => $message
]);