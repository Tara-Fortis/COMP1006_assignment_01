// adapted from https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/range

const value = document.querySelector("#value");
const input = document.querySelector("#book-progress");
value.textContent = input.value;
input.addEventListener("input", (event) => {
  value.textContent = event.target.value + "%";
});