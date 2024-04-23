
<?php
session_start(); // Start the session
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../inc/css/fundraiser.css" />
    <title>Registraion Form</title>
  </head>
  <body>
    <form action="../backend/insert_fund_data.php" class="form" method="post" enctype="multipart/form-data">
        <!-- Title of Steps -->
      <h1 class="text-center">Tell us a bit more about your fundraiser.</h1>
      <!-- Progress bar -->
      <div class="progressbar">
        <div class="progress" id="progress"></div>
        <div class="progress-step progress-step-active" data-title="Intro"></div>
        <div class="progress-step" data-title="Goal"></div>
        <div class="progress-step" data-title="Cover"></div>
        <div class="progress-step" data-title="Preview"></div>
      </div>

      <!-- Steps -->

      <!-- Step1 -->
      <div class="form-step form-step-active">
        <div class="input-group">
          <label for="fundTitle">Give your fundraiser a title</label>
          <input type="text" name="fundTitle" id="fundTitle" oninput="autoClone()" "/>
        </div>
        <div class="input-group">
          <label for="fundStory">Tell your story</label>
          <textarea name="fundStory" id="fundStory" cols="30" rows="10" oninput="autoClone()"></textarea>
        </div>
        <div class="btns-group">
          <a href="#" class="btn btn-next width-50 ml-auto">Next</a>
        </div>
      </div>

      <!-- Step2 -->
      <div class="form-step">
        <div class="input-group">
          <label for="fundTarget">How much would you like to raise?</label>
          <input type="text" name="fundTarget" id="fundTarget" oninput="autoClone()"/>
        </div>
        <div class="btns-group">
          <a href="#" class="btn btn-prev width-50">Previous</a>
          <a href="#" class="btn btn-next width-50">Next</a>
        </div>
      </div>
      <!-- Step3 -->
        <div class="form-step">
          <div class="photoContainer">
            <label for="fundFile" class="select-image">
              <div class="img-area" data-img="">
                <i class='bx bxs-cloud-upload icon'></i>
                <h3>Upload Image</h3>
                <p>Image size must be less than <span>2MB</span></p>
              </div>
              <input type="file" id="fundFile" accept="image/*" hidden onchange="autoClone()">
            </label>
          </div>
          <div class="btns-group">
            <a href="#" class="btn btn-prev width-50">Previous</a>
            <a href="#" class="btn btn-next width-50">Next</a>
          </div>
        </div>


      <!-- Step4 -->
      <div class="form-step">
            <label for="fundFileClone" class="select-image">
              <div class="img-area" data-img=""></div>
              <input type="file" name="fundFileClone" id="fundFileClone" accept="image/*" hidden>
            </label>
            <div class="input-group">
          <label for="fundTitleClone">Give your fundraiser a title</label>
          <input type="text" name="fundTitleClone" id="fundTitleClone" />
        </div>
        <div class="input-group">
          <label for="fundTargetClone">How much would you like to raise?</label>
          <input type="text" name="fundTargetClone" id="fundTargetClone" placeholder="$100" />
        </div>
        <div class="input-group">
          <label for="fundStoryClone">Tell your story</label>
          <textarea name="fundStoryClone" id="fundStoryClone" cols="30" rows="10"></textarea>
        </div>
        
        
        <div class="btns-group">
          <a href="#" class="btn btn-prev width-50">Previous</a>
          <input type="submit" value="Submit" class="btn width-50" />
        </div>
      </div>
    </form>
    <script src="../inc/js/fundraiser.js" defer></script>
    <script src="../inc/js/photoupload.js"></script>
    <script src="../inc/js/autoFill.js"></script>
  </body>
</html>
