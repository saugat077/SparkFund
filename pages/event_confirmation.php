<!-- Registration -->
<?php
include_once '../db.php';

// Check if registration was successful or failed
if (isset($_GET['registration']) && $_GET['registration'] === "success") {
    // Registration was successful
    $main_message = "Congratulations !!";
    $secondary_message = "Your Fundraising event has been successfully created.";
    $imagePath = "../inc/images/happy.gif";
    
} elseif (isset($_GET['error'])) {
    // Registration failed
    $main_message = "Failed to Create Your Event!!";
    $imagePath = "../inc/images/sad.gif";

    // Determine the reason for registration failure
    if ($_GET['error'] === "sqlerror") {
        $secondary_message = "An error occurred while processing your request. Please try again later.";
    } else {
        $secondary_message = "Fundraising event creation failed due to an unknown error.";
    }
} else {
    // Default message if no query parameters are provided
    $main_message = "Event Creation Status Unknown";
    $secondary_message = "Please check your Event Creation status.";
}
?>

<!-- Login -->
<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <link rel="stylesheet" href="../inc/css/loading.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Loading animation -->
<div class="center-body">
  <div class="loader-circle-9">
    <p>Loading</p>
    <span></span>
  </div>
</div>

<!-- Displaying the card with a message -->
<div class="confirm-body">
    <div class="confirmation-card">
        <div class="confirm-inner-body">

        
        <div class="confirm-message">
            <div class="main-area"><?php echo $main_message; ?></div>
            <div class="secondary-area"><?php echo $secondary_message; ?></div>
            <div class="confirm-image"><img src="<?php echo $imagePath; ?>" alt=""></div>
        </div>
        <div class="confirm-link">
            <a href="../index.php">Home</a>
            </div>

        </div>
    </div>
</div>

<script>
        // JavaScript code to hide loader and display card after 2 seconds
        setTimeout(function() {
            document.querySelector('.loader-circle-9').style.display = 'none';
            document.querySelector('.confirmation-card').style.display = 'block';
        }, 1500);
    </script>

</body>
</html>