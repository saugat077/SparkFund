// Define the getParameterByName function to extract URL parameters
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
      // Perform additional validation to ensure the user is not the event creator
      $.ajax({
        type: "POST",
        url: "../backend/donation_process.php", // URL of the PHP script to handle donation processing
        data: { eventId: eventId, userId: userId, amount: donationAmount },
        success: function (response) {
          if (response.trim() === "Donation successful") {
            $(".donation_success").show();
            $(".donation_failed").hide();
            $("#donationAmount").val(""); // Clear the donation amount input field
            $(".modal-content-default").hide(); // Hide the donation modal
            console.log("Donation successful");
          } else if (
            response.trim() ===
            "Error: Event creator cannot donate to their own event"
          ) {
            $(".donation_failed")
              .show()
              .text("Creator cannot donate to their own event");
            $(".donation_success").hide();
            $(".modal-content-default").hide();

            console.log("Creator cannot donate to their own event");
          } else {
            $(".donation_failed").show().text(response.trim());
            $(".donation_success").hide();
            console.error("Donation failed: " + response.trim());
          }
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
    } else {
      // Handle validation errors, such as empty donation amount or invalid event ID
      // You can display an error message to the user or perform other actions
      console.error(
        "Validation failed: Donation amount is empty or event ID is invalid."
      );
    }
  });
});
