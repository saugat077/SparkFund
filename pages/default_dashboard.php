<?php
    session_start(); // Start the session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../inc/css/default_dashboard.css">
</head>
<body>
    <div class="dash-container">
        <!-- Creator Dashboard -->
        <div class="dash creator">
            <h2>As Creator</h2>
            <div style="display:flex;">
                <div class="event-summary">
                    <h3>Events Created</h3>
                    <h1>
                        <?php
                            include '../db.php';
                            $user_id = $_SESSION['user_id'];
                            $query = "SELECT COUNT(*) AS total FROM funds WHERE user_id = $user_id";
                            $result = mysqli_query($conn, $query);
                            $data = mysqli_fetch_assoc($result);
                            echo $data['total'];
                        ?>
                    </h1>
                </div>
                <div class="event-amount">
                    <h3>Amount</h3>
                    <h1>
                        <?php
                            include '../db.php';
                            $user_id = $_SESSION['user_id'];
                            $query = "SELECT COALESCE(SUM(d.amount), 0) AS total
                                      FROM funds f
                                      LEFT JOIN donations d ON f.fund_id = d.funds_id
                                      WHERE f.user_id = $user_id";

                            $result = mysqli_query($conn, $query);

                            if ($result) {
                                $data = mysqli_fetch_assoc($result);
                                echo $data['total'];
                            } else {
                                echo 'Error: ' . mysqli_error($conn);
                            }
                        ?>
                    </h1>
                </div>
            </div>
        </div>

        <!-- Donor Dashboard -->
        <div class="dash donor">
            <h2>As Donor</h2>
            <div style="display:flex;">
                <div class="event-summary">
                    <h3>Events Donated</h3>
                    <h1>
                        <?php
                            include '../db.php';
                            $user_id = $_SESSION['user_id'];
                            $query = "SELECT COUNT(DISTINCT funds_id) AS total FROM donations WHERE user_id = $user_id";
                            $result = mysqli_query($conn, $query);
                            $data = mysqli_fetch_assoc($result);
                            echo $data['total'];
                        ?>
                    </h1>
                </div>
                <div class="event-amount">
                    <h3>Amount</h3>
                    <h1>
                        <?php
                            include '../db.php';
                            $user_id = $_SESSION['user_id'];
                            $query = "SELECT COALESCE(SUM(amount), 0) AS total FROM donations WHERE user_id = $user_id";
                            $result = mysqli_query($conn, $query);
                            $data = mysqli_fetch_assoc($result);
                            echo $data['total'];
                        ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
