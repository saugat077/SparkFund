<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sparkfund</title>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="./inc/css/style.css"> <!-- Main stylesheet -->
  <link rel="stylesheet" href="./inc/css/navbar.css"> <!-- Navbar stylesheet -->
  <link rel="stylesheet" href="./inc/css/EventsSection.css"> <!-- Events Section stylesheet -->
  <link rel="stylesheet" href="./inc/css/FeaturedSection.css"> <!-- Featured Section stylesheet -->
  <link rel="stylesheet" href="./inc/css/faq.css"> <!-- FAQ stylesheet -->
  <link rel="stylesheet" href="./inc/css/footer.css"> <!-- Footer stylesheet -->

  <!-- Font awesome CDN for using icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
  integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<body>
  <!-- Hero Section -->
  <header id="Home">
      <!-- Navbar Component imported-->
          <?php include('./inc/components/navbar.php'); ?>
          <!-- Spark fund button -->
          <h3 class="big-title translate" data-speed="-0.1">Your Home <br>For Help</h3>
          <?php
          // Check if the user is logged in
          if (isset($_SESSION['user_id'])) {
              // If logged in, redirect to the dashboard on button click 
              echo '<button class="start-fund translate" data-speed="-0.1"><a href="./pages/dashboard.php?option=fundraiser">Start a Sparkfund</a></button>';
          } else {
              // If not logged in, redirect to the login page on button click
              echo '<button class="start-fund translate" data-speed="-0.1"><a href="./pages/login.php">Start a Sparkfund</a></button>';
          }
          ?>
          <!-- Parallax image -->
          <img src="./inc/images/bg5_5.jpg" class="hero-section translate" data-speed="0.2" alt="Boy with his mom">
  </header>

  <!-- Main Section which contains everything-->
  <main>


    <!-- Shadow Overlay between image and div -->
    <div class="main-shadows"></div>


    <!-- Events Section that displays Recent 6 events -->
    <section class="events">
      <?php include('./inc/components/EventsSection.php'); ?>
    </section>


    <!-- Featured Topics in a carousel-->
    <section class="main-carousel" id="Featured">
      <!-- Title -->
      <div class="title">
        <h2>Featured Topics <div class="border"></div></h2>
      </div>
      <!-- Import Component -->
      <div class="featured-container">
        <?php include('./inc/components/FeaturedSection.html'); ?>
      </div>
    </section>


    <!-- Banner -->
    <div class="banner">
      <div class="text-container">
        <h2 class="banner-text">
          <strong>We've got you covered. </strong><br><br>
          Sparkfund is a trusted leader in online fundraising.
          With simple pricing and a team of Trust & Safety experts in your corner,
          you can raise money or make a donation with peace of mind.
        </h2>
      </div>
    </div>


    <!-- FAQ -->
    <div class="faq-main" id="FAQ">
      <!-- FAQ Imported -->
      <?php include('./inc/components/faq.html'); ?>
    </div>


  </main>

  <!-- Footer Section-->
  <div>
    <?php include('./inc/components/footer.html'); ?>
  </div>

  
  <!-- Scripts -->
  <script src="./inc/js/navbar.js"></script> <!-- Navbar script -->
  <script src="./inc/js/parallax.js"></script> <!-- Parallax script -->
  <script src="./inc/js/animation.js"></script> <!-- Animation script -->
  <script src="./inc/js/faq.js"></script>  <!-- FAQ script -->
</body>
</html>
