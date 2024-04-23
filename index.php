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
          <h3>Your home <br>for help</h3>
          <button><a href="./pages/dashboard.php?option=fundraiser">Start a Sparkfund </a></button>
  </header>




<!-- Main content area -->
  <main>
      <!-- Events section -->
      <section class="events">
  <div class="title">
      <h2>Funding events happening right now </h2>
  </div>
  <div class="container">
      <div class="parent">
          <?php
          // Include the database configuration file
          include_once "./db.php";
          
          // Fetch funding events from the database
          // $query = "SELECT funds.*, users.fname AS creator_name FROM funds LEFT JOIN users ON funds.user_id = users.id";
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
                //   echo '<a href="event_details.php?id=' . $fundId . '" class="event_details_link">';
                  echo '<div class="' . $divClass . '"> ';
                  echo '<a href="./pages/event_page.php?id=' . $fundId . '" style="color:var(--secondary);text-decoration:none;">';
                  echo '<div class="event-cover" style="background-image: url(\'./inc/uploads/' . str_replace(' ', '%20', $fundCover) . '\')">';
                  echo '<div class="creator-name">' . $creatorName . '</div>'; // Display the creator's name
                  echo '</div>';
                  echo '<div class="event-header"><h5>' . $fundTitle . '</h5></div>';
                  echo '<div class="event-fund-raised"><p>Shows how much is raised in a bar</p></div>'; // Replace this with your actual fund raised value
                  echo '</a>'; // Close the anchor tag
                  echo '</div>';
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


<!-- How Sparkfund works -->
    <!-- <section class="video">
          <div class="title">
              <h2>How Sparkfund works</h2>
          </div>
          <div class="container">
          <iframe width="100%" height="515"
              src="https://www.youtube.com/embed/zcruIov45bI?si=6YFa4t42TGzrUNrD"
              title="YouTube video player" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media;
              gyroscope; picture-in-picture; web-share"
              >
          </iframe>
          </div>
      </section> -->
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
  <div class="main">
      <section class="faq-container">
          <h2 class="title">Fundraise for anyone</h2>
          <!-- First Question -->
          <div class="faq">
              <div class="question">
                  <h3>Yourself</h3>
                  <i class="fa-solid fa-chevron-down"></i>
              </div>
              <div class="answer">
                  <p>
                      Funds are delivered to your bank account for your own use.
                  </p>
              </div>
          </div>
          <!-- Second Question -->
          <div class="faq">
              <div class="question">
                  <h3>Friends and family</h3>
                  <i class="fa-solid fa-chevron-down"></i>
              </div>
              <div class="answer">
                  <p>
                      You'll invite a beneficiary to receive funds or distribute them yourself.
                  </p>
              </div>
          </div>
          <!-- Third Question -->
          <div class="faq">
              <div class="question">
                  <h3>Charity</h3>
                  <i class="fa-solid fa-chevron-down"></i>
              </div>
              <div class="answer">
                  <p>
                      Funds are delivered to your chosen nonprofit for you.
                  </p>
              </div>
          </div>
      </section>
  </div>




  <script src="./inc/js/faq.js"></script>




</body>
</html>





