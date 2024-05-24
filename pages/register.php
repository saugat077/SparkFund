<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

    <!-- Link to CSS file for styling -->
    <link rel="stylesheet" href="../inc/css/login.css">

    <!-- Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <div class="reg-main-container">

    <!-- Main container with two sections -->
    <div class="register-container">

      <!-- Left Side Title Section -->
      <div class="reg-left">
        <h1 class="title">Welcome to <br>
        <span>SPARKFUND</span></h1>
        <!-- Link to login page -->
        <div class="sign-up-link">
          <a href="./login.php">Already have an account?</a>
        </div>
      </div>

      <!-- Right Side Signup/Register Section -->
      <div class="form-container">
        <!-- Title for the form -->
        <p>Create your account</p>

        <!-- Registration form sends data to register_validate.php-->
        <form class="form" id="registrationForm" method="post" action="../backend/register_validate.php">
          <legend>Your account details</legend>

          <!-- First name and last name fields -->
          <div class="input" style="display:flex;">
            <input type="text" name="fname" id="fname" placeholder="First name" style="margin-right:12px;width:50%;">
            <input type="text" name="lname" id="lname" placeholder="Last name" style="width:50%;">
          </div>
          <div id="fnameError" class="error-message"></div> <!-- Error message for first name -->
          <div id="lnameError" class="error-message"></div> <!-- Error message for last name -->

          <!-- Phone number field -->
          <div class="input">
            <input type="text" name="phoneno" id="phoneno" placeholder="Phone no"> 
          </div>
          <div id="numError" class="error-message"></div> <!-- Error message for phone number -->

          <!-- Email field -->
          <div class="input">
            <input type="email" name="email" id="email" placeholder="Email"> 
          </div>
          <div id="emailError" class="error-message"></div> <!-- Error message for email -->

          <!-- Password field -->
          <div class="box">   
            <input type="password" id="password" name="password" 
            placeholder="Password" onkeyup="checkPassword(this.value)" 
            autocomplete="current-password"> <!-- checkPassword function is called on keyup event and defined in pwvalidate.js -->
            <span id="toggleBtn"></span>
          </div>
          <div id="passwordError" class="error-message"></div> <!-- Error message for password -->

          <!-- Password validation information section -->
          <div class="validation">
            <p>Passwords must meet the following requirements:</p>
            <ul>
              <li id="length">Must be 8-12 Characters Long</li> 
              <li id="upper">At least One Uppercase</li>
              <li id="lower">At least One Lowercase</li>
              <li id="special">At least one ( ! @ # $ % & * = ? ) character</li>
              <li id="number">At least One Number</li>
            </ul>
          </div>

          <!-- Submit button -->
          <button type="submit" class="form-btn">Register</button>
        </form>
      </div>
    </div>
  </div>

  <!-- JavaScript files for form validation and functionality -->
  <script src="../inc/js/pwvalidate.js"></script> <!-- Password validation script -->
  <script src="../inc/js/register_emptyfield_validate.js"></script> <!-- Empty field validation script -->
  <script src="../inc/js/toggle.js"></script> <!-- Toggle password visibility script -->

</body>
</html>
