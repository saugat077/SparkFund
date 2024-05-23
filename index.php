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
  <link rel="stylesheet" href="./inc/css/footer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
  integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<body>
  <!-- Hero section -->
  <header id="Home">
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
        <?php
        include('./inc/components/EventSection.php');
        ?>
      </section>



<!-- Carousel section-->
    <section class="main-carousel" id="Featured">
          <div class="title">
                  <h2>Featured Topics <div class="border"></div></h2>
                  
              </div>
              <div class="featured-container">
              <?php
            include('./inc/components/carousel.html');
            ?>
            </div>
    </section>

    <!-- Banner section -->
  <div class="banner">
      <div class="text-container">
      <h2>
          <strong>We've got you covered. </strong><br>
          <br>
          Sparkfund is a trusted leader in online fundraising.
           With simple pricing and a team of Trust & Safety experts in your corner,
           you can raise money or make a donation with peace of mind.
      </h2>
      </div>
  </div>

  </main>



  



  <!-- FAQ -->
  <div class="faq-main" id="FAQ">
      <?php
        include('./inc/components/faq.html');
        ?>
  </div>



  <!-- Footer Section-->
  <div>
    <?php
    include('./inc/components/footer.html');
    ?>
  </div>


  
  <script src="./inc/js/faq.js"></script>
  <script src="./inc/js/parallax.js"></script>

</body>
</html>
