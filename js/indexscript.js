// Testimonial JS

let slide = document.getElementById("slide");
let upArrow = document.getElementById("upArrow");
let downArrow = document.getElementById("downArrow");

let x = 0;
upArrow.onclick = function () {
  if (x < 0) {
    x += 300;
    slide.style.top = x + "px";
  }
};

downArrow.onclick = function () {
  if (x > "-900") {
    x -= 300;
    slide.style.top = x + "px";
  }
};

// Contact US JS
const inputs = document.querySelectorAll(".input");

function focusFunc() {
  let parent = this.parentNode;
  parent.classList.add("focus");
}

function blurFunc() {
  let parent = this.parentNode;
  if (this.value == "") {
    parent.classList.remove("focus");
  }
}

inputs.forEach((input) => {
  input.addEventListener("focus", focusFunc);
  input.addEventListener("blur", blurFunc);
});
