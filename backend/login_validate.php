<?php
session_start(); // Start the session to use session variables
include '../db.php'; // Include the database connection

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to fetch the user data based on the email provided
    $query = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        // Fetch the user data
        $user = mysqli_fetch_assoc($result);

        // Verify the password using password_verify
        if ($user && password_verify($password, $user['password'])) {
            // Set session variables after successful login
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_fname'] = $user['fname'];
            
            // Redirect to login confirmation page with success status
            header("Location: ../pages/login_confirmation.php?login=success");
            exit();
        } else {
            // Invalid email or password, redirect to login page with failure status
            header("Location: ../pages/login.php?login=fail");
            exit();
        }
    } else {
        // Display an error message if there was an error in the query
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // If the request method is not POST, redirect to the login page
    header("Location: ../pages/login.php");
    exit();
}
?>
