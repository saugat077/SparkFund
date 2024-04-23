<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
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
      <img src="../inc/images/background_main.jpg" alt="">
    </div>
    
    <!-- Signup/Register Section -->
    <div class="form-container">
      <!-- Title section -->
      <h1 class="title">
        Welcome to <span>SPARKFUND</span> </h1>
      <p>Create your account</p>

      <!-- Form section -->
      <form class="form" id="registrationForm" method="post" action="../backend/register_validate.php">
        <legend>Your account details</legend>

        <!-- First name and last name -->
        <div class="input" style="display:flex;">
          <input type="text" name="fname" id="fname" placeholder="First name" style="margin-right:12px;width:50%;">
          <input type="text" name="lname" id="lname" placeholder="Last name" style="width:50%;">
        </div>
        <div id="fnameError" class="error-message"></div>
        <div id="lnameError" class="error-message"></div> 

        <!-- Email -->
        <div class="input">
          <input type="email"name="email" id="email" placeholder="Email"> 
        </div>
        <div id="emailError" class="error-message"></div>
         
        <!-- Password -->
        <div class="box">   
          <input type="password" id="password" name="password" 
          placeholder="Password"onkeyup="checkPassword(this.value)" 
          autocomplete="current-password">
          <span id="toggleBtn"></span>
        </div>
        <div id="passwordError" class="error-message"></div>
      
        <!-- Validation info section -->
        <div class="validation">
          <p>Passwords must meet the following requirements</p>
          <ul>
            <li id="length">Must be 8-10 Characters Long</li> 
            <li id="upper">At least One Uppercase</li>
            <li id="lower">At least One Lowercase</li>
            <li id="special">At least one ( ! @ # $ % & * = ? )character</li>
            <li id="number">At least One Number</li>
          </ul>
        </div>
        <!-- submit button -->
        <button type="submit" class="form-btn">Register</button>
        <div class="sign-up-link">
       <span ><a href="./login.php">Login</a></span>
      </div>
      </form>
      <!-- End of Right side -->
    </div>
    <!-- End of container -->
  </div>


  <script src="../inc/js/pwvalidate.js"></script>
  <script src="../inc/js/register_emptyfield_validate.js"></script>
  <script src="../inc/js/toggle.js"></script>

</body>
</html>
