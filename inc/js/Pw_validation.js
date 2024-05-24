// Get DOM elements for validation
const upperCase = document.getElementById("upper");
const lowerCase = document.getElementById("lower");
const specialChar = document.getElementById("special");
const digit = document.getElementById("number");
const minLength = document.getElementById("length");

// Function to validate the form fields
function validateForm() {
  // Check if all fields are valid using checkPassword function defined below
  const isPasswordValid = checkPassword(
    document.getElementById("password").value
  );
  return isPasswordValid;
}

// Function to check password strength
function checkPassword(password) {
  // Regular expressions to check password criteria
  const upper = new RegExp("(?=.*[A-Z])"); // At least one uppercase letter
  const lower = new RegExp("(?=.*[a-z])"); // At least one lowercase letter
  const special = new RegExp("(?=.*[!@#$%&*=?])"); // At least one special character
  const number = new RegExp("(?=.*[0-9])"); // At least one digit
  const length = new RegExp("^.{8,12}$"); // Password length between 8 and 12 characters

  // Store validation results for each criteria
  // test() is an inbuilt function provided by JavaScript's RegExp object.
  // It is used to match a regular expression against a string.
  const isUpperValid = upper.test(password);
  const isLowerValid = lower.test(password);
  const isSpecialValid = special.test(password);
  const isNumberValid = number.test(password);
  const isLengthValid = length.test(password);

  // Update validation status for each requirement using updateValidationStatus function below
  updateValidationStatus(isUpperValid, upperCase);
  updateValidationStatus(isLowerValid, lowerCase);
  updateValidationStatus(isSpecialValid, specialChar);
  updateValidationStatus(isNumberValid, digit);
  updateValidationStatus(isLengthValid, minLength);

  // Return true if all password requirements are met, otherwise return false
  return (
    isUpperValid &&
    isLowerValid &&
    isSpecialValid &&
    isNumberValid &&
    isLengthValid
  );
}

// Function to update validation status for a specific requirement
function updateValidationStatus(valid, element) {
  if (valid) {
    element.classList.add("valid");
  } else {
    element.classList.remove("valid");
  }
}

// Form submission handling
document
  .getElementById("registrationForm")
  .addEventListener("submit", function (event) {
    if (!validateForm()) {
      event.preventDefault(); // Prevent form submission if validation fails
    }
  });
