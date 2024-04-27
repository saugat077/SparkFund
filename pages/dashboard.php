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
    <?php include 'db.php'; ?>
    <main>
        <!-- The navigation options is kept here -->
        <aside>
            <!-- Top contains company logo with link -->
            <div class="top">
                <a href="../index.php">
                    <img src="../inc/assets/logo-main.png" alt="" height="65px">
                </a>
            </div>
            <!-- Middle contains the navigation options -->
            <div class="middle">
                <ul class="nav-list">
                    <!-- Each option has parameter set -->
                    <li><a href="dashboard.php?">Dashboard</a></li>
                    <li><a href="dashboard.php?option=fundraiser">Start a fundraiser</a></li>
                    <li><a href="dashboard.php?option=my_fundraisers">Your fundraisers</a></li>
                    <li><a href="dashboard.php?option=donations">Donations you've made</a></li>
                    <!-- <li><a href="dashboard.php?option=settings">Settings</a></li> -->
                </ul>        
            </div>
            <!-- Trademarks -->
            <div class="bottom">
                <p>Sparkfund &copy &reg</p>
            </div>
        </aside>
        
        <!-- Content showing section -->
        <div class="dashContainer">
            <!-- Header calls the navbar the shows username -->
            <header>
                <?php
                    include('../inc/components/navbarDash.php');
                ?>
            </header>
            <!-- The results are shown here -->
            <section>
                <?php
                    // Include necessary files
                    include('db.php');

                    // Check which option is selected
                    $option = isset($_GET['option']) ? $_GET['option'] : '';

                    // Based on the option, include relevant content
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
