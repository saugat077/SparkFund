<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize and validate input data
    $fname = mysqli_real_escape_string($conn, $_POST['fname']); 
    $lname = mysqli_real_escape_string($conn, $_POST['lname']); 
    $email = mysqli_real_escape_string($conn, $_POST['email']); 
    $password = mysqli_real_escape_string($conn, $_POST['password']); 

    // Check for empty fields
    if (empty($fname) || empty($lname) || empty($email) || empty($password)) {
        header("Location: ../pages/login_confirmation.php?error=emptyfields");
        exit();
    } else {
        // Check if the email already exists in the database
        $query = "SELECT * FROM users WHERE email=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $query)) {
            header("Location: ../pages/login_confirmation.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                // Email already exists, redirect back to confirmation page with an error
                header("Location: ../pages/login_confirmation.php?error=emailtaken");
                exit();
            } else {
                // Hash the password
                $hash = password_hash($password, PASSWORD_DEFAULT);

                // Insert the new user into the database
                $query = "INSERT INTO users (fname, lname, email, password) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    header("Location: ../pages/login_confirmation.php?error=sqlerror");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "ssss", $fname, $lname, $email, $hash);
                    mysqli_stmt_execute($stmt);
                    // Registration successful, redirect to confirmation page with success message
                    header("Location: ../pages/login_confirmation.php?registration=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../pages/register.php");
    exit();
}
?>
