window.addEventListener("scroll", function () {
  var navbar = document.getElementById("navbar");

  if (window.scrollY > 300) {
    // Adjust the scroll position where you want it to become sticky
    navbar.classList.add("nav-new");
  } else {
    navbar.classList.remove("nav-new");
  }
});

document.addEventListener("DOMContentLoaded", function () {
  var dropdownAfter = document.querySelector(".dropdown::after");
  var dropdownContent = document.querySelector(".dropdown-content");
  var dropdown = document.querySelector(".dropdown");
  var isDropdownVisible = false;

  dropdown.addEventListener("click", function (event) {
    if (isDropdownVisible) {
      dropdown.classList.remove("clicked");
      isDropdownVisible = false;
    } else {
      dropdown.classList.add("clicked");
      isDropdownVisible = true;
    }
  });

  // Close the dropdown content when clicking outside the dropdown
  document.addEventListener("click", function (event) {
    if (!dropdown.contains(event.target)) {
      dropdown.classList.remove("clicked");
      isDropdownVisible = false;
    }
  });
});
