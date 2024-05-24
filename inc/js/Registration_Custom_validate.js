// Get the registration form element
const form = document.getElementById("registrationForm");

// Add event listener for form submission
form.addEventListener("submit", function (event) {
  // Get input elements
  const fnameInput = document.getElementById("fname");
  const lnameInput = document.getElementById("lname");
  const emailInput = document.getElementById("email");
  const passwordInput = document.getElementById("password");
  const numberInput = document.getElementById("phoneno"); // New line for number input

  // Get error message elements
  const fnameError = document.getElementById("fnameError");
  const lnameError = document.getElementById("lnameError");
  const emailError = document.getElementById("emailError");
  const passwordError = document.getElementById("passwordError");
  const numberError = document.getElementById("numError"); // New line for number error

  // Clear previous error messages
  fnameError.textContent = "";
  lnameError.textContent = "";
  emailError.textContent = "";
  passwordError.textContent = "";
  numberError.textContent = ""; // New line to clear number error

  // Validate first name
  if (!fnameInput.value) {
    fnameError.textContent = "First name is required";
    event.preventDefault();
  }

  // Validate last name
  if (!lnameInput.value) {
    lnameError.textContent = "Last name is required";
    event.preventDefault();
  }

  // Validate email
  if (!emailInput.value) {
    emailError.textContent = "Email is required";
    event.preventDefault();
  } else if (!emailInput.value.endsWith("@gmail.com")) {
    // Prevents the form submission if email does not end with "@gmail.com"
    emailError.textContent = "Please enter a valid Gmail address";
    event.preventDefault();
  }

  // Validate password
  if (!passwordInput.value) {
    passwordError.textContent = "Password is required";
    event.preventDefault();
  }

  // Validate phone number
  if (!numberInput.value) {
    numberError.textContent = "Phone number is required";
    event.preventDefault();
  } else if (!/^98\d{8}$/.test(numberInput.value)) {
    // Check if the number starts with "98" and is 10 characters long
    numberError.textContent =
      "Phone number must start with '98' and be 10 characters long";
    event.preventDefault();
  }
});
