<?php
session_start(); 
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input for security purpose
    $email = mysqli_real_escape_string($conn, $_POST['email']); 
    $password = mysqli_real_escape_string($conn, $_POST['password']);


    $query = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $user = mysqli_fetch_assoc($result);

        // Verify the password using password_verify
        if ($user && password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_fname'] = $user['fname'];
            
            // Redirect to index.php after successful login
            header("Location: ../pages/login_confirmation.php?login=success");
            exit();
        } else {
            // Invalid email or password
            header("Location: ../pages/login.php?login=fail");
        }
    } else {
        // Error in the query
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
