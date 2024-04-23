<?php
// Check if the login attempt was failed
if (isset($_GET['login']) && $_GET['login'] === "fail") {
  // Display the error message on the page
  echo '<script>
          document.addEventListener("DOMContentLoaded", function() {
              // Update the error message element with the desired text
              var errorMessage = document.getElementById("passwordError");
              errorMessage.style.display = "block"; // Show the error message
          });
        </script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../inc/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
   <!-- Container with two grids -->
   <div class="container">
    <!-- Shows the photo on the left side -->
    <div class="authPhoto">
      <img src="../inc/images/2.jpeg" alt="">
    </div>

  <!-- Signup Card-->
  <div class="form-container">
       <h1 class="title">
        Login to <span>SPARKFUND</span> </h1>

      <!-- Signup Form Section-->
      <form class="form" id="registrationForm" method="post" action="../backend/login_validate.php">
        <legend>Your account details</legend>
         <!-- Email -->
        <div class="input">
          <input type="email"name="email" id="email" placeholder="Email"> 
        </div>
        <div id="emailError" class="error-message"></div>

        <!-- Password -->
        <div class="box">   
          <input type="password" id="password" name="password" 
          placeholder="Password" 
          autocomplete="current-password">
          <span id="toggleBtn"></span>
        </div>
        <div id="passwordError" class="error-message" style="color:red;height:20px;display:none;">Invalid email or password</div>


        <p class="page-link">
          <span class="page-link-label">Forgot Password?</span>
        </p>

        <button class="form-btn">Log in</button>
      </form>

      <!-- Google signup -->
      <!-- <div class="buttons-container">
        <div class="google-login-button">
          <svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1.1" x="0px" y="0px" class="google-icon" viewBox="0 0 48 48" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
            <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12
	          c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24
	          c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path>
            <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657
	          C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path>
            <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36
	          c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path>
            <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571
	          c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
          </svg>
          <span>Continue with Google</span>
        </div>
      </div> -->

       <!-- Register Link -->
       <div class="sign-up-label">
        Don't have an account?<span class="sign-up-link"><a href="./register.php">Register</a></span>
      </div>

    </div>
    
  </div>
  
  <script src="../inc/js/pwvalidate.js"></script>
  <script src="../inc/js/register_emptyfield_validate.js"></script>
  <script src="../inc/js/toggle.js"></script>
</body>
</html>