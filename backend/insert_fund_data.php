<?php
session_start(); // Start the session
?>
<?php
// Include your db.php file to establish the database connection
include_once "../db.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get data from form submission
    $fundTitle = $_POST["fundTitleClone"];
    $fundTarget = $_POST["fundTargetClone"];
    $fundStory = $_POST["fundStoryClone"];
    $fundFile = $_FILES["fundFileClone"]["name"];
    $fundFileTemp = $_FILES["fundFileClone"]["tmp_name"];

    // Initialize event variables
    $eventTitle = $fundTitle;
    $eventDescription = $fundStory;
    $eventTarget = $fundTarget;

   // Check if user is logged in and retrieve user information from the database
if(isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id']; // Retrieve user ID from session
    
    // Prepare and execute SQL query to fetch user's first name, last name, and email
    $query = "SELECT fname, lname, email FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Check if the query was successful and if user information was found
    if ($result && $result->num_rows > 0) {
        // Fetch user details from the database
        $userData = $result->fetch_assoc();
        $creatorName = $userData['fname'] . ' ' . $userData['lname']; // Get the creator's name
        $creatorEmail = $userData['email']; // Get the user's email
    } else {
        // Handle the case if user information was not found
        die("User information not found.");
    }
} else {
    // Handle the case if user is not logged in
    die("User is not logged in.");
}


    // File upload path
    $targetDir = "../inc/uploads";
    $targetFilePath = $targetDir . '/' . $fundFile;

    // Check if file was uploaded successfully
    if(move_uploaded_file($fundFileTemp, $targetFilePath)) {
        // Insert the entry into the database
        $query = "INSERT INTO funds (user_id, fund_title, fund_target, fund_story, fund_cover) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("issss", $userId, $fundTitle, $fundTarget, $fundStory, $fundFile);

        if ($stmt->execute()) {
            require_once '../backend/send_events_mail.php'; // Include send_mail.php only when creation is successful
            header("Location: ../pages/event_confirmation.php?registration=success");
            exit();
        } else {
            header("Location: ../pages/event_confirmation.php?error=sqlerror");
            exit();
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "File upload error: " . $_FILES["fundFileClone"]["error"];
    }
}

// Close the database connection
mysqli_close($conn);
?>
