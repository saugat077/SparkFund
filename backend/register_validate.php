<?php
include '../db.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize and validate input data
    $fname = mysqli_real_escape_string($conn, $_POST['fname']); 
    $lname = mysqli_real_escape_string($conn, $_POST['lname']); 
    $email = mysqli_real_escape_string($conn, $_POST['email']); 
    $password = mysqli_real_escape_string($conn, $_POST['password']); 
    $phone = mysqli_real_escape_string($conn, $_POST['phoneno']);


    // Check for empty fields
    if (empty($fname) || empty($lname) || empty($email) || empty($password) || empty($phone)) {
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
                $query = "INSERT INTO users (fname, lname, email, password, number) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    header("Location: ../pages/login_confirmation.php?error=sqlerror");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "sssss", $fname, $lname, $email, $hash, $phone);
                    mysqli_stmt_execute($stmt);

                    // Registration successful, send email to the user
                    
                    $receiverEmail = $email;
                    $receiverName = $fname . ' ' . $lname;
                    require_once '../backend/send_mail.php'; // Include send_mail.php only when registration is successful


                     // Redirect to confirmation page with success message
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
