document.addEventListener("DOMContentLoaded", () => {
  const inputFile = document.querySelector("#fundFile");
  const imgArea = document.querySelector(".img-area");

  // Function to display the selected image
  const displayImage = (image) => {
    if (image && image.size < 2000000) {
      const reader = new FileReader();
      reader.onload = () => {
        // Remove any existing image
        imgArea.innerHTML = "";

        // Display the uploaded image
        const imgUrl = reader.result;
        const img = document.createElement("img");
        img.src = imgUrl;
        imgArea.appendChild(img);
        imgArea.classList.add("active");
        imgArea.dataset.img = image.name;
      };
      reader.readAsDataURL(image);
    } else {
      alert("Image size must be less than 2MB");
    }
  };

  // Listen for change in the file input
  inputFile.addEventListener("change", () => {
    const image = inputFile.files[0];
    displayImage(image);
  });
});
