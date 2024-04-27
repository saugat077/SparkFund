<?php
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../inc/src/Exception.php';
require '../inc/src/PHPMailer.php';
require '../inc/src/SMTP.php';

// $receiver = $_GET['email'];

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->SMTPAuth = true;
//to view proper logging details for success and error messages
// $mail->SMTPDebug = 1;
$mail->Host = 'smtp.gmail.com';  //gmail SMTP server
$mail->Username = 'ksaugat77@gmail.com';   //email
$mail->Password = 'lbqk slse sudw xtil';   //16 character obtained from app password created
$mail->Port = 465;                    //SMTP port
$mail->SMTPSecure = "ssl";


//sender information
$mail->setFrom('prime.bca@email.com', 'SparkFund Team');

//receiver address and name
$mail->addAddress($creatorEmail, $creatorName);
// $mail->addAddress($receiver, 'Aakriti');



// Add cc or bcc   
// $mail->addCC('email@mail.com');  
// $mail->addBCC('user@mail.com');  

// $mail->addAttachment(__DIR__ . '/download.png');
// $mail->addAttachment(__DIR__ . '/exampleattachment2.jpg');


$mail->isHTML(true);

$mail->Subject = 'Event Creation Successful';
$mail->Body = "<html>
<head>
    <style>
      /* Specify the Poppins font */
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
      body {
        font-family: 'Poppins', sans-serif;
      }
    </style>
  </head>

  <body>
  <h4>Dear $creatorName,</h4>
  <h4 style=\"font-weight: 600\">
    Your Fundraising event has been successfully created.
    
  </h4>
  <p>
    ======= Event Details ======= <br /> <br />
    <b>Event Title:</b> $eventTitle <br />
    <b>Event Description:</b> $eventDescription <br />
    <b>Event Creator:</b> $creatorName <br />
    <b>Event Target Amount: </b>$eventTarget <br />
  </p>
  <p style=\"font-weight: 500\">
    Best regards,<br />
    SparkFund Team
  </p>
</body>
</html>";



// Send mail   
if (!$mail->send()) {
    echo 'Email not sent an error was encountered: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent.';
}

$mail->smtpClose();
