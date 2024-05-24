<?php
session_start(); // Start the session to use session functions

// Destroy all session data
session_destroy(); 

// Redirect the user to the homepage after session destruction
header("Location: ../index.php");
exit(); // Ensure the script stops executing after the redirect
?>
