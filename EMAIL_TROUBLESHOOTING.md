# Email Form Troubleshooting Guide

## Problem
Form shows "success" message but emails aren't being sent or received.

## Common Causes & Solutions

### 1. Check Your .env File on Server

**On Hostinger, verify your `.env` file has the correct SMTP credentials:**

```bash
# Your .env should look like this (with actual values):
SMTP_HOST=smtp.hostinger.com
SMTP_PORT=465
SMTP_USERNAME=noreply@bitglow.tech
SMTP_PASSWORD=your_actual_password_here
```

**Important Notes:**
- The email address (SMTP_USERNAME) must be a real email account you created in Hostinger
- You can't use a non-existent email address
- The password must match the email account password

### 2. Create Email Account in Hostinger

If you haven't already:

1. Log into Hostinger hPanel: https://hpanel.hostinger.com
2. Go to **Emails** section
3. Click **Create Email Account**
4. Create: `noreply@thelightglobal.com` (or update your .env to match an existing email)
5. Set a strong password
6. Use this email/password in your `.env` file

### 3. Verify SMTP Settings

**Hostinger SMTP Settings:**
- **Host:** `smtp.hostinger.com`
- **Port:** `465` (SSL) or `587` (TLS)
- **Encryption:** SSL (port 465) or STARTTLS (port 587)
- **Authentication:** Required

### 4. Update .env to Use Your Domain Email

Your `.env` currently references `noreply@bitglow.tech`. You should change this to:

```
SMTP_USERNAME=noreply@thelightglobal.com
SMTP_PASSWORD=your_password_for_this_email
```

### 5. Enable Debug Mode (Temporary)

To see detailed error messages, temporarily enable debug mode:

**In send.php line 123, change:**
```php
$mail->SMTPDebug = 0; // Set to 2 for detailed debugging
```

**To:**
```php
$mail->SMTPDebug = 2; // Set to 2 for detailed debugging
```

Then submit the form again and check the browser console or network tab for detailed error messages.

**IMPORTANT:** Set this back to `0` after troubleshooting!

### 6. Check PHP Error Logs

On Hostinger:
1. Go to hPanel
2. Navigate to **Advanced** → **Error Logs**
3. Check for PHP errors related to mail sending
4. Look for authentication failures or connection errors

### 7. Common Error Messages & Fixes

**"Authentication failed"**
- Email/password is incorrect
- The email account doesn't exist
- Check for typos in .env

**"Connection timeout"**
- Port is blocked (try 587 instead of 465)
- Firewall issue
- Wrong SMTP host

**"Sender address rejected"**
- The email address doesn't exist on your domain
- You need to create the email account first

**"Relay access denied"**
- SMTP authentication is required
- Check username/password

### 8. Test SMTP Connection

You can test if SMTP is working by creating a simple test file:

**Create `test-email.php` in your root directory:**

```php
<?php
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
        list($name, $value) = explode('=', $line, 2);
        $_ENV[trim($name)] = trim($value);
    }
}

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = $_ENV['SMTP_HOST'];
    $mail->SMTPAuth = true;
    $mail->Username = $_ENV['SMTP_USERNAME'];
    $mail->Password = $_ENV['SMTP_PASSWORD'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = $_ENV['SMTP_PORT'];
    $mail->SMTPDebug = 2; // Show detailed debug info

    $mail->setFrom($_ENV['SMTP_USERNAME'], 'Test');
    $mail->addAddress('DCD@thelightglobal.com'); // Your email

    $mail->Subject = 'SMTP Test Email';
    $mail->Body = 'If you receive this, SMTP is working!';

    $mail->send();
    echo 'Email sent successfully!';
} catch (Exception $e) {
    echo "Email failed: {$mail->ErrorInfo}";
}
?>
```

**Visit:** `https://thelightglobal.com/test-email.php`

**DELETE this file after testing for security!**

### 9. Alternative: Use Hostinger's Default PHP mail()

If SMTP continues to fail, you can use PHP's built-in `mail()` function as a fallback (less reliable but simpler):

This requires changes to send.php, but let's try SMTP first.

### 10. Quick Checklist

- [ ] Email account exists in Hostinger (noreply@thelightglobal.com)
- [ ] .env file exists on server with correct credentials
- [ ] SMTP_USERNAME matches an existing email account
- [ ] SMTP_PASSWORD is correct
- [ ] Port 465 is being used (or try 587)
- [ ] No typos in .env file
- [ ] Email logs checked in Hostinger

## Need Help?

If you're still stuck, enable SMTPDebug = 2 and send me:
1. The exact error message from the debug output
2. Confirmation that the email account exists in Hostinger
3. Which port you're using (465 or 587)

## Security Reminder

- Never share your actual passwords
- Keep .env file secure
- Delete test-email.php after testing
- Set SMTPDebug back to 0 after troubleshooting
