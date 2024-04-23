
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

    // Check if user is logged in
    if(isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id']; // Retrieve user ID from session
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
            echo "Fundraiser created successfully";
        } else {
            echo "Failed to create fundraiser";
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
