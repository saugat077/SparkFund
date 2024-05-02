<?php
// Include database connection file
include_once "../db.php";

// Start session
session_start();

// Check if eventId and userId are stored in session
if (isset($_SESSION['eventId'], $_SESSION['userId'])) {
    // Retrieve eventId and userId from session and sanitize input
    $eventId = mysqli_real_escape_string($conn, $_SESSION['eventId']);
    $userId = mysqli_real_escape_string($conn, $_SESSION['userId']);
    
    // Set the constant amount
    $amount = 999.99; // Set the constant amount here

    // Insert the donation into the donations table
    $query = "INSERT INTO donations (funds_id, user_id, amount) VALUES ('$eventId', '$userId', '$amount')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Donation insertion successful
        echo "Donation successful";
    } else {
        // Donation insertion failed
        // You can handle errors more gracefully here, e.g., redirect to an error page
        echo "Error: Failed to process donation. Please try again later.";
    }
} else {
    // Required parameters not set
    // You can handle errors more gracefully here, e.g., redirect to an error page
    echo "Error: Required parameters missing";
}

echo "<button><a href='../index.php'>Go back to the homepage</a></button>";
?>
