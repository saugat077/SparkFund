<?php
// Include database connection file
include_once "../db.php";

// Check if the required parameters are set in the request
if (isset($_POST['eventId']) && isset($_POST['userId']) && isset($_POST['amount'])) {
    // Sanitize input to prevent SQL injection
    $eventId = mysqli_real_escape_string($conn, $_POST['eventId']);
    $userId = mysqli_real_escape_string($conn, $_POST['userId']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);

    // Fetch the event details including the creator's user_id
    $query = "SELECT user_id FROM funds WHERE fund_id = '$eventId'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $eventCreatorId = $row['user_id'];

        // Check if the user trying to donate is not the creator of the event
        if ($userId != $eventCreatorId) {
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
            // User is the creator of the event
            echo "Error: Event creator cannot donate to their own event";
        }
    } else {
        // Error querying the database
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Required parameters not set
    echo "Error: Required parameters missing";
}
?>
