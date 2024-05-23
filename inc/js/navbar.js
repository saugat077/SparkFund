// Add an event listener for the scroll event
window.addEventListener("scroll", function () {
  var navbar = document.getElementById("navbar");
  // Check if the scroll position is greater than 80 pixels
  if (window.scrollY > 80) {
    // If it is, add the "nav-new" class to make the navbar sticky
    navbar.classList.add("nav-new");
  } else {
    // If it is not, remove the "nav-new" class to revert the navbar to its original state
    navbar.classList.remove("nav-new");
  }
});

// Add an event listener for the DOMContentLoaded event
document.addEventListener("DOMContentLoaded", function () {
  var dropdownContent = document.querySelector(".dropdown-content");
  var dropdown = document.querySelector(".dropdown");

  // Check if dropdown and dropdownContent exist before adding event listeners
  if (dropdown && dropdownContent) {
    var isDropdownVisible = false;

    // Add a click event listener to the dropdown element
    dropdown.addEventListener("click", function (event) {
      // Prevent the click event from bubbling up to the document
      event.stopPropagation();

      // Check if the dropdown is currently visible
      if (isDropdownVisible) {
        // If it is, remove the "clicked" class
        dropdown.classList.remove("clicked");
        // Set the visibility flag to false
        isDropdownVisible = false;
        // Hide the dropdown content
        dropdownContent.style.display = "none";
      } else {
        // If it is not, add the "clicked" class
        dropdown.classList.add("clicked");
        // Set the visibility flag to true
        isDropdownVisible = true;
        // Show the dropdown content
        dropdownContent.style.display = "block";
      }
    });

    // Close the dropdown content when clicking outside the dropdown
    document.addEventListener("click", function (event) {
      // Check if the click event target is not within the dropdown element
      if (!dropdown.contains(event.target)) {
        // If it is not, remove the "clicked" class from the dropdown
        dropdown.classList.remove("clicked");
        // Set the visibility flag to false
        isDropdownVisible = false;
        // Hide the dropdown content
        dropdownContent.style.display = "none";
      }
    });
  }
});
