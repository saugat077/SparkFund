<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Fundraisers</title>
    <link rel="stylesheet" href="../inc/css/my_fundraisers.css">
</head>
<body>
<div class="entries">
    <?php
    // Include the database configuration file
    include '../db.php';

    // Fetch user entries from the database
    $query = "SELECT * FROM funds where user_id=" . $_SESSION['user_id'];
    $result = mysqli_query($conn, $query);

    // Check if there are any entries
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $fundId = $row['fund_id'];
            $fundTitle = $row['fund_title'];
            $fundTarget = $row['fund_target'];
            $fundStory = $row['fund_story'];
            $fund_cover = $row['fund_cover'];
           
            // Display the entry
            echo '<div class="entry-container">';
            echo '<div class="entry-left">';
            echo '<img src="../inc/uploads/' . $fund_cover . '" alt="' . $fund_cover . '" class="left-image">';
            echo '</div>';
            echo '<div class="entry-right">';
            echo '<div class="entry-details">';
            echo '<h3>' . $fundTitle . '</h3>';
            // echo '<p>' . $fundStory . '</p>';
            echo '</div>';
            echo '<div class="entry-actions">';
            echo '<a href="edit.php?id=' . $fundId . '" class="btn-edit"><i class="fa-solid fa-pen-to-square"></i></a>';
            echo '<a href="../backend/fund_delete.php?id=' . $fundId . '" class="btn-delete" onclick="return confirm(\'Are you sure you want to delete this entry?\')"><i class="fa-regular fa-trash-can"></i></a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<p style="color:var(--white);font-size:24px;">No entries found.</p>';
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</div>
</body>
</html>
