<?php
session_start(); // Start the session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../inc/css/dashboard.css">
</head>
<body>
    <!-- Include the database configuration file -->
    <?php include 'db.php'; ?>

    <main>
        <!-- Sidebar navigation -->
        <aside>
            <!-- Top section containing company logo with link -->
            <div class="top">
                <a href="../index.php">
                    <img src="../inc/assets/logo-main.png" alt="Company Logo" height="65px">
                </a>
            </div>

             <!-- Middle section containing navigation options -->
             <div class="middle">
                <ul class="nav-list">
                    <!-- Define the active option -->
                    <?php $option = isset($_GET['option']) ? $_GET['option'] : ''; ?>

                    <li><a href="dashboard.php" class="<?php echo ($option == '') ? 'active' : ''; ?>">Dashboard</a></li>
                    <li><a href="dashboard.php?option=fundraiser" class="<?php echo ($option == 'fundraiser') ? 'active' : ''; ?>">Start a fundraiser</a></li>
                    <li><a href="dashboard.php?option=my_fundraisers" class="<?php echo ($option == 'my_fundraisers') ? 'active' : ''; ?>">Your fundraisers</a></li>
                    <li><a href="dashboard.php?option=donations" class="<?php echo ($option == 'donations') ? 'active' : ''; ?>">Donations you've made</a></li>
                </ul>        
            </div>

            <!-- Bottom section containing trademarks -->
            <div class="bottom">
                <p>Sparkfund &copy; &reg;</p>
            </div>
        </aside>

        <!-- Main content area -->
        <div class="dashContainer">
            <!-- Header containing navbar showing username -->
            <header>
                <?php include('../inc/components/navbarDash.php'); ?>
            </header>

            <!-- Section for displaying different contents based on navigation selection -->
            <section>
                <?php
                // Get the selected option from the URL parameter
                $option = isset($_GET['option']) ? $_GET['option'] : '';

                // Include content based on the selected option
                switch ($option) {
                    case 'fundraiser':
                        include('./fundraiser.php');
                        break;
                    case 'my_fundraisers':
                        include('./my_fundraisers.php');
                        break;
                    case 'donations':
                        include('./donations.php');
                        break;
                    case 'settings':
                        include('./settings.php');
                        break;
                    default:
                        include('./default_dashboard.php'); // Default content
                        break;
                }
                ?>
            </section>
        </div>
    </main>
</body>
</html>
