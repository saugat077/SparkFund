// getting password and toggle id for hide and unhide
let password = document.getElementById("password");
let toggleBtn = document.getElementById("toggleBtn");

//hide and unhide password
toggleBtn.onclick = function () {
  if (password.type === "password") {
    password.setAttribute("type", "text");
    toggleBtn.classList.add("hide");
  } else {
    password.setAttribute("type", "password");
    toggleBtn.classList.remove("hide");
  }
};
