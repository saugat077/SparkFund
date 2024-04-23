// Define the getParameterByName function outside of the $.ajax call
function getParameterByName(name) {
  const urlParams = new URLSearchParams(window.location.search);
  return urlParams.get(name);
}

$(document).ready(function () {
  $("#submitDonation").click(function () {
    var donationAmount = $("#donationAmount").val(); // Retrieve donation amount from input field
    var eventId = getParameterByName("id"); // Get event ID from URL parameter
    var userId = $("#userId").val(); // Retrieve user ID from hidden input field

    // Check if donation amount is not empty and event ID is valid
    if (donationAmount !== "" && eventId !== null && eventId !== "") {
      $.ajax({
        type: "POST",
        url: "../backend/donation_process.php", // URL of the PHP script to handle donation processing
        data: { eventId: eventId, userId: userId, amount: donationAmount },
        success: function (response) {
          // Display success message and hide failure message
          $(".donation_success").show();
          $(".donation_failed").hide();
          $("#donationAmount").val(""); // Clear the donation amount input field
          $(".modal-content-default").hide(); // Hide the donation modal
          console.log("Donation successful");
        },
        error: function (xhr, status, error) {
          // Display failure message and hide success message
          $(".donation_failed").show();
          $(".donation_success").hide();
          $("#donationAmount").val(""); // Clear the donation amount input field
          $(".modal-content-default").hide(); // Hide the donation modal

          console.error(xhr.responseText);
          // Display error message or handle error as needed
        },
      });
    }
  });
});
