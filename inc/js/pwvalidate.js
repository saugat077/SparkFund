// getting ids for validation
let upperCase = document.getElementById("upper");
let lowerCase = document.getElementById("lower");
let specialChar = document.getElementById("special");
let digit = document.getElementById("number");
let minLength = document.getElementById("length");

// Function to validate the form fields
function validateForm() {
  // Check if all fields are valid
  const isPasswordValid = checkPassword(
    document.getElementById("password").value
  );
  return isPasswordValid;
}

function checkPassword(data) {
  // regex expressions
  const upper = new RegExp("(?=.*[A-Z])"); // checks if the string contains character from A-Z
  const lower = new RegExp("(?=.*[a-z])"); // checks if the string contains character from a-z
  const special = new RegExp("(?=.*[!@#$%&*=?])"); // checks if the string contains these characters
  const number = new RegExp("(?=.*[0-9])"); // checks if the string contains character from 0-9
  const length = new RegExp("^.{8,12}$"); // checks if the length of string is between 8 and 10

  // storing in a variable after check
  const isUpperValid = upper.test(data);
  const isLowerValid = lower.test(data);
  const isSpecialValid = special.test(data);
  const isNumberValid = number.test(data);
  const isLengthValid = length.test(data);

  // Update validation status for each requirement
  validStatus(isUpperValid, "upper");
  validStatus(isLowerValid, "lower");
  validStatus(isSpecialValid, "special");
  validStatus(isNumberValid, "number");
  validStatus(isLengthValid, "length");

  // Return true if all password requirements are met, otherwise return false
  return (
    isUpperValid &&
    isLowerValid &&
    isSpecialValid &&
    isNumberValid &&
    isLengthValid
  );
}

function validStatus(valid, field) {
  const element = document.getElementById(field);
  if (valid) {
    element.classList.add("valid");
  } else {
    element.classList.remove("valid");
    return false;
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
