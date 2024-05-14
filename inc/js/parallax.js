const translate = document.querySelectorAll(".translate");

window.addEventListener("scroll", () => {
  let scroll = window.scrollY;

  translate.forEach((element) => {
    let speed = element.dataset.speed;
    element.style.transform = `translateY(${scroll * speed}px)`;
    // element.style.transition = "transform 0.1s linear";
  });
});
