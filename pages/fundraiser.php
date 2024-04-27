<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="../inc/css/fundraiser.css">
</head>
<body>
    <form action="../backend/insert_fund_data.php" class="form" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <h1 class="text-center">Tell us a bit more about your fundraiser.</h1>
        <div class="progressbar">
            <div class="progress" id="progress"></div>
            <div class="progress-step progress-step-active" data-title="Intro"></div>
            <div class="progress-step" data-title="Goal"></div>
            <div class="progress-step" data-title="Cover"></div>
            <div class="progress-step" data-title="Preview"></div>
        </div>

        <!-- Step 1 -->
        <div class="form-step form-step-active">
            <div class="input-group">
                <label for="fundTitle">Give your fundraiser a title</label>
                <input type="text" name="fundTitle" id="fundTitle" oninput="autoClone()" required>
            </div>
            <div class="input-group">
                <label for="fundStory">Tell your story</label>
                <textarea name="fundStory" id="fundStory" cols="30" rows="10" oninput="autoClone()" required></textarea>
            </div>
            <div class="btns-group">
                <a href="#" class="btn btn-next width-50 ml-auto">Next</a>
            </div>
        </div>

        <!-- Step 2 -->
<div class="form-step">
    <div class="input-group">
        <label for="fundTarget">How much would you like to raise?</label>
        <!-- Use pattern attribute to only accept integers -->
        <!-- Provide a custom error message using the title attribute -->
        <input type="text" name="fundTarget" id="fundTarget" oninput="autoClone()" pattern="\d+" title="Please enter only numbers." required>
        <!-- The pattern="\d+" attribute enforces only digits (0-9) are allowed -->
    </div>
    <div class="btns-group">
        <a href="#" class="btn btn-prev width-50">Previous</a>
        <a href="#" class="btn btn-next width-50">Next</a>
    </div>
</div>



        <!-- Step 3 -->
        <div class="form-step">
            <div class="photoContainer">
                <label for="fundFile" class="select-image">
                    <div class="img-area" data-img="">
                        <i class="bx bxs-cloud-upload icon"></i>
                        <h3>Upload Image</h3>
                        <p>Image size must be less than <span>2MB</span></p>
                    </div>
                    <input type="file" id="fundFile" accept="image/*" hidden onchange="autoClone()" required>
                </label>
            </div>
            <div class="btns-group">
                <a href="#" class="btn btn-prev width-50">Previous</a>
                <a href="#" class="btn btn-next width-50">Next</a>
            </div>
        </div>

        <!-- Step 4 -->
        <div class="form-step">
            <label for="fundFileClone" class="select-image">
                <div class="img-area" data-img=""></div>
                <input type="file" name="fundFileClone" id="fundFileClone" accept="image/*" hidden>
            </label>
            <div class="input-group">
                <label for="fundTitleClone">Give your fundraiser a title</label>
                <input type="text" name="fundTitleClone" id="fundTitleClone" required>
            </div>
            <div class="input-group">
                <label for="fundTargetClone">How much would you like to raise?</label>
                <input type="text" name="fundTargetClone" id="fundTargetClone" placeholder="$100" pattern="\d+" title="Please enter only numbers." required>
            </div>
            <div class="input-group">
                <label for="fundStoryClone">Tell your story</label>
                <textarea name="fundStoryClone" id="fundStoryClone" cols="30" rows="10" required></textarea>
            </div>
            <div class="btns-group">
                <a href="#" class="btn btn-prev width-50">Previous</a>
                <input type="submit" value="Submit" class="btn width-50">
            </div>
        </div>
    </form>

    <script src="../inc/js/fundraiser.js" defer></script>
    <script src="../inc/js/photoupload.js"></script>
    <script src="../inc/js/autoFill.js"></script>

    <script>
        function validateForm() {
            var fundTitle = document.getElementById('fundTitle').value;
            var fundStory = document.getElementById('fundStory').value;
            var fundTarget = document.getElementById('fundTarget').value;
            var fundFile = document.getElementById('fundFile').value;
            var fundFileClone = document.getElementById('fundFileClone').value;

            if (fundTitle == "" || fundStory == "" || fundTarget == "" || fundFile == "" || fundFileClone == "") {
                alert("All fields are required");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
