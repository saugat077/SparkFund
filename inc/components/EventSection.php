<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="title" id="Happening">
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
</body>
</html>