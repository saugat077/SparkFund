// Update cloned elements immediately when called
var fundTitle = document.getElementById("fundTitle").value;
var fundStory = document.getElementById("fundStory").value;
var fundTarget = document.getElementById("fundTarget").value;

// document.getElementById("fundTitleClone").value = fundTitle;
// document.getElementById("fundStoryClone").value = fundStory;
// document.getElementById("fundTargetClone").value = fundTarget;

// Optionally log these values to the console for debugging
console.log("Fund Title: ", fundTitle);
console.log("Fund Story: ", fundStory);
console.log("Fund Target: ", fundTarget);

// Photo upload handling
const selectImage = document.querySelector(".select-image");
const inputFile = document.querySelector("#fundFile");
const imgArea = document.querySelector(".img-area");
const imgAreaClone = document
  .querySelector("#fundFileClone")
  .closest(".form-step")
  .querySelector(".img-area");

selectImage.addEventListener("click", function () {
  inputFile.click();
});

inputFile.addEventListener("change", function () {
  const image = this.files[0];
  if (image.size < 2000000) {
    const reader = new FileReader();
    reader.onload = () => {
      // Remove any existing image
      const allImg = imgArea.querySelectorAll("img");
      allImg.forEach((item) => item.remove());

      // Display the uploaded image
      const imgUrl = reader.result;
      const img = document.createElement("img");
      img.src = imgUrl;
      imgArea.appendChild(img);
      imgArea.classList.add("active");
      imgArea.dataset.img = image.name;

      // Update cloned file input
      const fileList = new DataTransfer();
      fileList.items.add(image);
      document.getElementById("fundFileClone").files = fileList.files;

      // Display the image in the preview section
      imgAreaClone.innerHTML = '<img src="' + imgUrl + '" />';
    };
    reader.readAsDataURL(image);
  } else {
    alert("Image size more than 2MB");
  }
});
