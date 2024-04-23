function autoClone() {
  var fundTitle = document.getElementById("fundTitle").value;
  var fundStory = document.getElementById("fundStory").value;
  var fundTarget = document.getElementById("fundTarget").value;
  var fundFile = document.getElementById("fundFile").files[0];

  // Update cloned elements
  document.getElementById("fundTargetClone").value = fundTarget;
  document.getElementById("fundTitleClone").value = fundTitle;
  document.getElementById("fundStoryClone").value = fundStory;

  // Set the selected file to the cloned file input
  var fundFileClone = document.getElementById("fundFileClone");
  if (fundFile && fundFileClone) {
    var fileList = new DataTransfer();
    fileList.items.add(fundFile);
    fundFileClone.files = fileList.files;

    // Display the selected image in Step 4
    var reader = new FileReader();
    reader.onload = function (event) {
      var imgAreaClone = document
        .querySelector("#fundFileClone")
        .closest(".form-step")
        .querySelector(".img-area");
      imgAreaClone.innerHTML = '<img src="' + event.target.result + '" />';
    };
    reader.readAsDataURL(fundFile);
  }
}
