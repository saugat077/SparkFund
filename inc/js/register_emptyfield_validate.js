const form = document.getElementById("registrationForm");

form.addEventListener("submit", function (event) {
  const fnameInput = document.getElementById("fname");
  const lnameInput = document.getElementById("lname");
  const emailInput = document.getElementById("email");
  const passwordInput = document.getElementById("password");

  const fnameError = document.getElementById("fnameError");
  const lnameError = document.getElementById("lnameError");
  const emailError = document.getElementById("emailError");
  const passwordError = document.getElementById("passwordError");

  fnameError.textContent = "";
  lnameError.textContent = "";
  emailError.textContent = "";
  passwordError.textContent = "";

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
});
