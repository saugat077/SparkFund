<?php
session_start(); // Start the session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
</head>
<body>
    <nav id="navbar">
        <!-- Left side is a non-functional search button -->
        <div class="left">
            <ul>
                <li>Search</li>
            </ul>
        </div>

        <!-- Middle side contains the logo -->
        <div class="middle">
            <a href="#"> <!-- Redirect to the home page -->
                <img src="./inc/assets/logo-black-outline.png" alt="">
            </a>
        </div>

        <!-- Right side contains the navigation links -->
        <div class="right">
            <ul>
                <?php
                // Check if the user is logged in
                if (isset($_SESSION['user_fname'])) {
                    echo '<li><a href="./pages/dashboard.php">Dashboard</a></li>'; // Redirect to the dashboard
                    echo '<li class="dropdown">Welcome, ' . $_SESSION['user_fname']; // Display the user's first name
                    echo '<div class="dropdown-content" id="dropdownContent"> 
                            <a href="./backend/logout.php" style="color: red;">Log out</a>
                          </div>
                          </li>'; // Redirect to the logout page on click
                } else {
                    // if user is not logged in, display the sign in and start a sparkfund button
                    echo '<li><a href="./pages/login.php">Sign in</a></li>';
                    echo '<li><button><a href="./pages/login.php">Start a sparkfund</a></button></li>';
                }
                ?>
            </ul>
        </div>
    </nav>

   <!-- Component contains script -->
</body>
</html>
