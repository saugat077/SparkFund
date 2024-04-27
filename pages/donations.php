<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Fundraisers</title>
    <link rel="stylesheet" href="../inc/css/my_fundraisers.css">
    <!-- <link rel="stylesheet" href="../inc/css/event_page.css"> -->
</head>
<body>
<div class="entries">
    <?php
    // Include the database configuration file
    include '../db.php';

    // Fetch user entries from the database
    $query = "SELECT DISTINCT f.*
    FROM funds f
    INNER JOIN donations d ON f.fund_id = d.funds_id
    WHERE d.user_id = " . $_SESSION['user_id'];
    $result = mysqli_query($conn, $query);


    // Check if there are any entries
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $eventId = $row['fund_id'];
        $fundTitle = $row['fund_title'];
        $fundTarget = $row['fund_target'];
        $fundStory = $row['fund_story'];
        $fund_cover = $row['fund_cover'];

        // Display the entry
        echo '<div class="entry-container">';
        echo '<div class="entry-left">';
        // Wrap the image inside an anchor tag with the appropriate href
        echo '<a href="http://localhost/sparkfund/pages/event_page.php?id=' . $eventId . '">';
        echo '<img src="../inc/uploads/' . $fund_cover . '" alt="' . $fund_cover . '" class="left-image">';
        echo '</a>';
        echo '</div>';
        echo '<div class="entry-right">';
        echo '<div class="entry-details">';
        echo '<h3>' . $fundTitle . '</h3>';

        // Fetch the total sum of donations for the event
        $totalDonations = 0;
        $query = "SELECT SUM(amount) AS total_donations FROM donations WHERE funds_id = $eventId";
        $donationResult = mysqli_query($conn, $query);
        if ($donationResult && mysqli_num_rows($donationResult) > 0) {
            $totalDonations = mysqli_fetch_assoc($donationResult)['total_donations'];
        }

        // Calculate the percentage of the goal reached
        $percentage = ($totalDonations / $fundTarget) * 100;

        // Display the total donations raised and the progress bar
        echo '<div class="donation-raised">';
        if ($totalDonations == 0) {
            echo '<h5 style="color:var(--white)">$0 raised of $' . $fundTarget . ' goal.</h5>';
        } else {
            echo '<h5 style="color:var(--white)">$' . $totalDonations . ' raised of $' . $fundTarget . ' goal.</h5>';
        }
        echo '</div>';

        echo '<div class="donation-progress-bar">';
        echo '<div class="progress-bar-inner" style="width: ' . $percentage . '%;"></div>';
        echo '</div>';

        // Display the user's donation for this event
        $query = "SELECT SUM(amount) AS total_donation
        FROM donations
        WHERE user_id = {$_SESSION['user_id']} AND funds_id = $eventId";
        $donationResult = mysqli_query($conn, $query);
        if ($donationResult && mysqli_num_rows($donationResult) > 0) {
            $totalDonations = mysqli_fetch_assoc($donationResult)['total_donation'];
        } else {
            $totalDonations = 0; // Set total donations to 0 if there are no donations for this event
        }



        echo '<div class="user-donation">';
        echo '<p>You donated: <span>$' . $totalDonations . '</span></p>';
        echo '</div>';

        echo '</div>';

        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<p style="color:var(--white);font-size:24px;">No entries found.</p>';
}

    // Close the database connection
    mysqli_close($conn);
    ?>
</div>
</body>
</html>
