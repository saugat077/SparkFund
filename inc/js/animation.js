// Function to check if the element is in the viewport
function isElementInViewport(el) {
  const rect = el.getBoundingClientRect();
  return rect.top < window.innerHeight && rect.bottom >= 0;
}

// Function to add the animation class when the element is in view
function addAnimateOnScroll() {
  const h2 = document.querySelector(".banner-text");
  if (isElementInViewport(h2)) {
    h2.classList.add("animate");
    window.removeEventListener("scroll", addAnimateOnScroll);
  }
}

// Add scroll event listener
window.addEventListener("scroll", addAnimateOnScroll);

// Initial check in case the element is already in view
document.addEventListener("DOMContentLoaded", addAnimateOnScroll);
