const btn = document.getElementById("btn");
const color = document.querySelector(".color");

btn.addEventListener("click", function () {
  // get random number between 0 and 3
  const randomNum1 = getRandomNumber();
  const randomNum2 = getRandomNumber();
  const randomNum3 = getRandomNumber();
  let colorString = `rgba(${randomNum1},${randomNum2},${randomNum3}, 1)`;
  document.body.style.backgroundColor = colorString;
  color.textContent = colorString;
});

function getRandomNumber() {
  return Math.floor(Math.random() * 255);
}
