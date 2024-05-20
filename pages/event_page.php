<?php
session_start(); // Start the session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../inc/css/event_page.css">
    <title>Sparkfund Event</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
  integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<body>
   <!-- Hero section -->
  <header>
      <!-- Navbar -->
          <?php
          include('../inc/components/navbarEvents.php');
          ?>
  </header>

  <main>
  <?php
    // Include the database configuration file
    include_once "../db.php";

    // Check if the 'id' parameter is set in the URL
    if(isset($_GET['id'])) {
        // Get the event ID from the URL parameter
        $eventId = $_GET['id'];

        // Prepare and execute the SQL query to fetch event details
        $query = "SELECT funds.*, users.fname AS creator_name
                  FROM funds
                  LEFT JOIN users ON funds.user_id = users.id
                  WHERE fund_id = $eventId";
        $result = mysqli_query($conn, $query);

        // Check if the query was successful and if event details were found
        if ($result && mysqli_num_rows($result) > 0) {
            // Fetch event details from the database
            $eventDetails = mysqli_fetch_assoc($result);

            // Store event details in variables
            $eventTitle = $eventDetails['fund_title'];
            $eventCover = $eventDetails['fund_cover'];
            $eventDescription = $eventDetails['fund_story']; 
            $creatorName = $eventDetails['creator_name']; // Get the creator's name
?>
<section class="event-details-section">
    <!-- Event Title fetched from the database -->
    <div class="event-title">
        <h2><?php echo $eventTitle; ?></h2>
    </div>
    <!-- Event Details fetched from the database -->
    <div class="event-container">
        <!-- Left side that shows details of events -->
        <div class="event-details">
            <div class="event-cover">
                <img src="../inc/uploads/<?php echo $eventCover; ?>" alt="">
            </div>
            <div class="event-creator">
                <i class="fa-solid fa-circle-user"></i>
                <p> <?php echo $creatorName; ?> is organizing this fundraiser.</p>
            </div>
            <div class="event-description">
                <p><?php echo $eventDescription; ?></p>
            </div>
        </div>


        <?php
        } else {
            // If event details were not found, display a message
            echo '<p style="color: white;">Event details not found.</p>';
        }
    } else {
        // If 'id' parameter is not set in the URL, display a message
        echo '<p style="color: white;">Event ID not provided.</p>';
    }

    
?>



<!-- Right side that shows donation div -->
<div class="event-donate" id="donationContainer">
    <?php
    // Include the database configuration file
    include_once "../db.php";

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
    ?>

    <div class="donation-raised">
        <?php
        // Display the total donations raised
        if ($totalDonations == 0) {
            echo '<h5>NRs 0 raised of NRs ' . $fundTarget . ' goal.</h5>';
        } else {
            echo '<h5> <span> NRs ' . $totalDonations . ' </span> raised of NRs ' . $fundTarget . ' goal.</h5>';
        }
        ?>
    </div>

    <div class="donation-progress-bar">
        <div class="progress-bar-inner" style="width: <?php echo ($totalDonations / $fundTarget) * 100; ?>%;">
            <!-- <p>Fundraising Progress</p> -->
        </div>
    </div>

    <button id="donateButton">Donate Now</button>
    <!-- Add this button near the event details section -->
<button class="copy-button" onclick="copyLink()">Share</button>


    <div class="donator-number">
    <i class="fa-solid fa-chart-simple"></i>
    <?php
    // Query to count the number of unique users who donated to the event
    $query = "SELECT COUNT(DISTINCT user_id) AS unique_donators FROM donations WHERE funds_id = $eventId";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $uniqueDonators = mysqli_fetch_assoc($result)['unique_donators'];
        echo '<p>' . $uniqueDonators . ' people just donated</p>';
    } else {
        echo '<p>0 people donated</p>';
    }
    ?>
</div>

</div>


<!-- Donation Modal -->
<div id="donationModal" class="modal">
    <div class="modal-content">
        <!-- <div class="modal-content-default"> -->
            <div class="close_navbar">
                <span class="close">&times;</span>
            </div>
            <!-- <h2>Enter Donation Amount</h2> -->
            <form id="donationForm" action="../backend/khalti_pay.php" method="post">
                <input type="text" name="donationAmount" placeholder="Enter amount">
                <input type="hidden" name="userId" value="<?php echo $_SESSION['user_id']; ?>">
                <input type="hidden" name="eventId" value="<?php echo $eventId; ?>">
                <button type="submit">Donate</button>
                <!-- <button type="submit">Submit</button> -->
            </form>
        <!-- </div> -->
    </div>
</div>


</section>


<!-- Section ends here -->

  </main>

  <script src="../inc/js/donation_prompt.js"></script>
  <!-- Include jQuery library -->
<script src="../inc/js/ajax.js"></script>
  <!-- <script src="../inc/js/donation.js"></script> -->
  <script src="../inc/js/copylink.js"></script>
</body>
</html>
