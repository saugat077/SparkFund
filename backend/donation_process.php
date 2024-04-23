<?php
// Include database connection file
include_once "../db.php";

// Check if the required parameters are set in the request
if (isset($_POST['eventId']) && isset($_POST['userId']) && isset($_POST['amount'])) {
    // Sanitize input to prevent SQL injection
    $eventId = mysqli_real_escape_string($conn, $_POST['eventId']);
    $userId = mysqli_real_escape_string($conn, $_POST['userId']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);

    // Insert the donation into the donations table
    $query = "INSERT INTO donations (funds_id, user_id, amount) VALUES ('$eventId', '$userId', '$amount')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Donation insertion successful
        echo "Donation successful";
    } else {
        // Donation insertion failed
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Required parameters not set
    echo "Error: Required parameters missing";
}
?>
