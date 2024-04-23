<?php
session_start(); // Start the session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="../inc/css/navbarDash.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<body>
    <nav id="navbar">

        <div class="right">
            <ul>
                <?php
        if (isset($_SESSION['user_fname'])) {
            echo '<li class="dropdown">Welcome, ' . $_SESSION['user_fname'];
            // echo '<a href="#" class="dropbtn"><i class="fa-solid fa-caret-down"></i></a>
            echo '<div class="dropdown-content"  id="dropdownContent">
                <a href="../backend/logout.php" style="color: red;">Log out</a>
            </div>
        </li>';
        } else {
            echo '<li><a href="./pages/login.php">Sign in</a></li>';
            echo '<li><button><a href="">Start a sparkfund</a></button></li>';
        }
        
        ?>
            </ul>
        </div>
    </nav>
    <script src="../inc/js/navbar.js"></script>
</body>
</html>