<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="../inc/css/fundraiser.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
  integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<body>
    <!-- Event creation form -->
    <form action="../backend/insert_fund_data.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
    <!-- Title -->
        <h1 class="text-left">Tell us a bit more about your fundraiser.</h1>
        <!-- Event form -->
        <div class="form-container">
            <!-- Image of the event would be placed here -->
            <div class="photoContainer">
                <label for="fundFile" class="select-image">
                    <div class="img-area" data-img="">
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                        <h3>Upload Image</h3>
                        <p>Image size must be less than <span>2MB</span></p>
                    </div>
                    <input type="file" id="fundFile" name="fundFile" accept="image/*" hidden required>
                </label>
            </div>
            <!-- Details of the event will be placed here -->
            <div class="input-container">
                <div class="input-group title">
                    <label for="fundTitle">Give your fundraiser a title</label>
                    <input type="text" name="fundTitle" id="fundTitle" required placeholder="Fundraising for ....">
                </div>
                <div class="input-group target">
                    <label for="fundTarget">How much would you like to raise?</label>
                    <input type="text" name="fundTarget" id="fundTarget" pattern="\d+" title="Please enter only numbers." placeholder="NRs 100" required >
                </div>
                <div class="input-group story">
                    <label for="fundStory">Tell your story</label>
                    <textarea name="fundStory" id="fundStory" cols="30" rows="10" placeholder="..." required></textarea>
                </div>
            </div>
        </div>
        <div class="btns-group">
            <input type="submit" value="Submit" class="btn width-50">
        </div>
    </form>

    <script>
        function validateForm() {
            var fundTitle = document.getElementById('fundTitle').value;
            var fundStory = document.getElementById('fundStory').value;
            var fundTarget = document.getElementById('fundTarget').value;
            var fundFile = document.getElementById('fundFile').value;

            if (fundTitle === "" || fundStory === "" || fundTarget === "" || fundFile === "") {
                alert("All fields are required");
                return false;
            }
            return true;
        }
    </script>

    <script src="../inc/js/photoupload.js"></script>
</body>
</html>

