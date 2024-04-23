// Function to open the donation modal
function openDonationModal() {
  var modal = document.getElementById("donationModal");
  modal.style.display = "block";
}

// Function to close the donation modal
function closeDonationModal() {
  var modal = document.getElementById("donationModal");
  modal.style.display = "none";
}

//Hide the donation modal
function hideDonationPrompt() {
  var modal = document.getElementById("donationModal");
  modal.style.display = "none";
}

// Function to handle clicking on the "Donate Now" button
function handleDonateButtonClick() {
  var donateButton = document.getElementById("donateButton");
  donateButton.addEventListener("click", openDonationModal);
}

// Function to handle clicking on the close button
function handleCloseButtonClick() {
  var closeBtn = document.querySelector(".close");
  closeBtn.addEventListener("click", closeDonationModal);
}

// Function to close modal when clicking outside of it
function handleCloseModalOutsideClick() {
  var modal = document.getElementById("donationModal");
  window.addEventListener("click", function (event) {
    if (event.target == modal) {
      closeDonationModal();
    }
  });
}

// Call the functions to set up event listeners
handleDonateButtonClick();
handleCloseButtonClick();
handleCloseModalOutsideClick();
