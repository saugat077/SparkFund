// Select all elements with the class "translate"
const translate = document.querySelectorAll(".translate");

// Add a scroll event listener to the window
window.addEventListener("scroll", () => {
  // Get the current vertical scroll position
  let scroll = window.scrollY;

  // Loop through each element with the class "translate"
  translate.forEach((element) => {
    // Get the speed of translation for the current element from the "data-speed" attribute
    let speed = element.dataset.speed;

    // Apply translation to the element based on scroll position and speed
    element.style.transform = `translateY(${scroll * speed}px)`;

    // Note: The following line is commented out, it appears to be intended for adding a transition effect
    element.style.transition = "transform 0.1s linear";
  });
});
