<?php
session_start(); // Start the session
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sparkfund</title>
  <link rel="stylesheet" href="./inc/css/style.css">
  <link rel="stylesheet" href="./inc/css/faq.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
  integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<body>
  <!-- Hero section -->
  <header>
      <!-- Navbar -->
          <?php
          include('./inc/components/navbar.php');
          ?>
          <!-- Spark fund button -->
          <h3 class="big-title translate" data-speed="-0.1">Your Home <br>For Help</h3>
          <?php
    // Check if the user is logged in
    if (isset($_SESSION['user_id'])) {
        // If logged in, redirect to the dashboard
        echo '<button class="start-fund translate" data-speed="-0.1"><a href="./pages/dashboard.php?option=fundraiser">Start a Sparkfund</a></button>';
    } else {
        // If not logged in, redirect to the login page
        echo '<button class="start-fund translate" data-speed="-0.1"><a href="./pages/login.php">Start a Sparkfund</a></button>';
    }
    ?>

    <img src="./inc/images/bg5_5.jpg" class="hero-section translate" data-speed="0.2" alt="Boy with his mom">
  </header>

<!-- Main content area -->
  <main>
    <div class="main-shadows"></div>
      <!-- Events section -->
      <section class="events">
  <div class="title">
      <h2>Funding Events Happening Right Now 
        <div class="border"></div>
      </h2>
  </div>
  <div class="events-container">
      <div class="parent">
          <?php
          // Include the database configuration file
          include_once "./db.php";
          
          // Fetch funding events from the database
          $query = "SELECT funds.*, users.fname AS creator_name
                    FROM funds
                    LEFT JOIN users ON funds.user_id = users.id
                    ORDER BY funds.fund_id DESC
                    LIMIT 5";

          $result = mysqli_query($conn, $query);

          // Check if there are any events
          if (mysqli_num_rows($result) > 0) {
              $counter = 1; // Initialize a counter variable
              // Loop through each event and display it
              while ($row = mysqli_fetch_assoc($result)) {
                  $fundId = $row['fund_id']; // Get the fund ID
                  $fundTitle = $row['fund_title'];
                  $fundCover = $row['fund_cover'];
                  $creatorName = $row['creator_name']; // Get the creator's name

                  // Define the class name for the div dynamically based on the counter
                  $divClass = 'div' . $counter;

                  // Display the event HTML
                  echo '<div class="' . $divClass . '"> ';
                  echo '<a href="./pages/event_page.php?id=' . $fundId . '" style="color:var(--secondary);text-decoration:none;">';
                  echo '<div class="event-cover" style="background-image: url(\'./inc/uploads/' . str_replace(' ', '%20', $fundCover) . '\')">';
                  echo '<div class="creator-name">' . $creatorName . '</div>'; // Display the creator's name
                  echo '</div>';
                  echo '<div class="event-header"><h5>' . $fundTitle . '</h5></div>';
                  echo '<div class="event-fund-raised">';
                  
                  // Fetch the total sum of donations for the event
                  $totalDonations = 0;
                  $query_donations = "SELECT SUM(amount) AS total_donations FROM donations WHERE funds_id = $fundId";
                  $result_donations = mysqli_query($conn, $query_donations);
                  if ($result_donations && mysqli_num_rows($result_donations) > 0) {
                      $totalDonations = mysqli_fetch_assoc($result_donations)['total_donations'];
                  }

                  // Fetch the fund target from the database
                  $query_target = "SELECT fund_target FROM funds WHERE fund_id = $fundId";
                  $result_target = mysqli_query($conn, $query_target);
                  if ($result_target && mysqli_num_rows($result_target) > 0) {
                      $fundTarget = mysqli_fetch_assoc($result_target)['fund_target'];
                  } else {
                      $fundTarget = 0; // Default value if no fund target is found
                  }

                  // Calculate the percentage of the goal reached
                  $percentage = ($totalDonations / $fundTarget) * 100;

                  
                  echo '<div class="donation-progress-bar">';
                  echo '<div class="progress-bar-inner" style="width: ' . $percentage . '%;"></div>';
                    echo '</div>';
                  echo '</div>'; // Close the event-fund-raised div

                  // Display the total donations raised and the progress bar
                  if ($totalDonations == 0) {
                    echo '<p>NRs 0 raised.</p>';
                } else {
                    echo '<p>NRs ' . $totalDonations . ' raised </p>';
                }

                  echo '</a>'; // Close the anchor tag
                  echo '</div>'; // Close the div with the event
                  // Increment the counter
                  $counter++;
              }
          } else {
              echo '<p style="color:white;">No funding events found.</p>';
          }
          // Close the database connection
          mysqli_close($conn);
          ?>
      </div>
  </div>
</section>

<!-- Carousel -->
<section class="main-carousel">
      <div class="title">
              <h2>Featured Topics <div class="border"></div></h2>
              
          </div>
          <div class="featured-container">
          <?php
        include('./inc/components/carousel.html');
        ?>
        </div>
      </section>


  </main>

  <div class="banner">
      <div class="text-container">
      <h2>
          We've got you covered. <br>
          <br>
          Sparkfund is a trusted leader in online fundraising.
           With simple pricing and a team of Trust & Safety experts in your corner,
           you can raise money or make a donation with peace of mind.
      </h2>
      </div>
  </div>

  <!-- FAQ -->
  <div class="faq-main">
      <?php
        include('./inc/components/faq.html');
        ?>
  </div>

  <script src="./inc/js/faq.js"></script>
  <script src="./inc/js/parallax.js"></script>

</body>
</html>
