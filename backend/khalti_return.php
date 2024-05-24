<?php
// Include database connection file
include_once "../db.php";

// Start session
session_start();

// Variables for messages
$message = "";
$success = false;

// Check if eventId and userId are stored in session
if (isset($_SESSION['eventId'], $_SESSION['userId'])) {
    // Retrieve eventId and userId from session
    $eventId = $_SESSION['eventId'];
    $userId = $_SESSION['userId'];
    
    $message = "Donation successful";
    $success = true;
} else {
    $message = "Error: Required parameters missing.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Status</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
  integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer">

    <style>
        /** Imported Google Fonts **/
        @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

        :root {
  --main: #0e0e11;
  --secondary: #2a2b2b;
  --white: #fefffe;
  --accent: #66c18f;
  --accent2: #defcf9;
}
        body {
            font-family: "Poppins", sans-serif;

            background-color: var(--main);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            background: var(--accent2);
            padding: 5rem;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container>*{
            margin-bottom: 2rem;
        }
        i{
            font-size: 5em;
            color: <?php echo $success ? 'var(--accent)' : 'red'; ?>;
        }
        .message {
            font-size: 1.5rem;
            color: <?php echo $success ? 'green' : 'red'; ?>;
            font-weight: 500;
        }
        .button {
            margin-top: 20px;
        }
        .button a {
            text-decoration: none;
            background: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .button a:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div>
        <i class="fa-regular fa-circle-check"></i>
        </div>
        <div class="message">
            <?php echo $message; ?>
        </div>
        <div class="button">
            <a href="../index.php">Go back to the homepage</a>
        </div>
    </div>
</body>
</html>
