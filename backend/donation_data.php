<?php
// Include the database configuration file
include_once "../db.php";

// Get the event ID from the GET parameter
$eventId = $_GET['eventId'];

// Fetch the total sum of donations for the event
$totalDonations = 0;
$query = "SELECT SUM(amount) AS total_donations FROM donations WHERE funds_id = $eventId";
$result = mysqli_query($conn, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $totalDonations = mysqli_fetch_assoc($result)['total_donations'];
}

// Fetch the fund target from the database
$query = "SELECT fund_target FROM funds WHERE fund_id = $eventId";
$result = mysqli_query($conn, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $fundTarget = mysqli_fetch_assoc($result)['fund_target'];
} else {
    $fundTarget = 0; // Default value if no fund target is found
}

// Generate HTML code for the donation container with the updated data
$html = '<div class="donation-raised">';
if ($totalDonations == 0) {
    $html .= '<h5>$0 raised of $' . $fundTarget . ' goal.</h5>';
} else {
    $html .= '<h5>$' . $totalDonations . ' raised of $' . $fundTarget . ' goal.</h5>';
}
$html .= '</div>';
$html .= '<div class="donation-progress-bar">';
$html .= '<div class="progress-bar-inner" style="width: ' . (($totalDonations / $fundTarget) * 100) . '%;"></div>';
$html .= '</div>';
$html .= '<button id="donateButton">Donate Now</button>';
$html .= '<div class="donator-number">';
$html .= '<i class="fa-solid fa-chart-simple"></i>';
$html .= '<p>100 people just donated</p>';
$html .= '</div>';

// Return the HTML code
echo $html;
?>
