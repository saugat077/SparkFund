const form = document.getElementById("registrationForm");

form.addEventListener("submit", function (event) {
  const fnameInput = document.getElementById("fname");
  const lnameInput = document.getElementById("lname");
  const emailInput = document.getElementById("email");
  const passwordInput = document.getElementById("password");
  const numberInput = document.getElementById("phoneno"); // New line for number input

  const fnameError = document.getElementById("fnameError");
  const lnameError = document.getElementById("lnameError");
  const emailError = document.getElementById("emailError");
  const passwordError = document.getElementById("passwordError");
  const numberError = document.getElementById("numError"); // New line for number error

  fnameError.textContent = "";
  lnameError.textContent = "";
  emailError.textContent = "";
  passwordError.textContent = "";
  numberError.textContent = ""; // New line to clear number error

  if (!fnameInput.value) {
    fnameError.textContent = "First name is required";
    event.preventDefault();
  }

  if (!lnameInput.value) {
    lnameError.textContent = "Last name is required";
    event.preventDefault();
  }

  if (!emailInput.value) {
    emailError.textContent = "Email is required";
    event.preventDefault();
  }

  if (!passwordInput.value) {
    passwordError.textContent = "Password is required";
    event.preventDefault();
  }

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
