// Function to check if the element is in the viewport
function isElementInViewport(el) {
  // Get the position and size of the element's bounding box relative to the viewport
  const rect = el.getBoundingClientRect();
  // Check if the top of the element is within the viewport's height and the bottom is below 0
  return rect.top < window.innerHeight && rect.bottom >= 0;
}

// Function to add the animation class when the element is in view
function addAnimateOnScroll() {
  // Select the element to be animated
  const h2 = document.querySelector(".banner-text");
  // Check if the element is in the viewport
  if (isElementInViewport(h2)) {
    // Add the "animate" class to trigger the animation
    h2.classList.add("animate");
    // Remove the scroll event listener to avoid unnecessary checks
    window.removeEventListener("scroll", addAnimateOnScroll);
  }
}

// Add scroll event listener to trigger animation when element is in view
window.addEventListener("scroll", addAnimateOnScroll);

// Check if the element is already in view when the document is loaded
document.addEventListener("DOMContentLoaded", addAnimateOnScroll);
