<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Include the PHPMailer files
require '../inc/src/Exception.php';
require '../inc/src/PHPMailer.php';
require '../inc/src/SMTP.php';

// Assuming $receiverEmail and $receiverName are defined and provided before this script
// $receiverEmail = 'example@example.com';
// $receiverName = 'John Doe';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();                                     // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                      // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                              // Enable SMTP authentication
    $mail->Username = 'ksaugat77@gmail.com';             // SMTP username
    $mail->Password = 'lbqk slse sudw xtil';             // SMTP password (app password for security)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;     // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                   // TCP port to connect to

    // Enable verbose debug output for logging (optional)
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    // Sender information
    $mail->setFrom('prime.bca@email.com', 'SparkFund Team');

    // Recipient information
    $mail->addAddress($receiverEmail, $receiverName);

    // Optionally add CC or BCC
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Optionally add attachments
    // $mail->addAttachment('/path/to/file.pdf');
    // $mail->addAttachment('/path/to/image.jpg', 'new.jpg');

    // Email format and content
    $mail->isHTML(true);                                 // Set email format to HTML
    $mail->Subject = 'Sparkfund Registration Successful';
    $mail->Body = "
    <html>
    <head>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
            body {
                font-family: 'Poppins', sans-serif;
            }
        </style>
    </head>
    <body>
        <h4>Dear $receiverName,</h4>
        <h4 style=\"font-weight: 600\">
            Thank you for registering with
            <span style=\"color: #66c18f\">SPARKFUND.</span> <br />Your account has been
            successfully created.
        </h4>
        <p>
            You can now log in to your account using the email address and password
            you provided during registration.
        </p>
        <p style=\"font-weight: 500\">
            Best regards,<br />
            SparkFund Team
        </p>
    </body>
    </html>";

    // Send the email
    $mail->send();
    echo 'Message has been sent.';
} catch (Exception $e) {
    echo "Email not sent. Mailer Error: {$mail->ErrorInfo}";
}

// Close the SMTP connection
$mail->smtpClose();
?>
