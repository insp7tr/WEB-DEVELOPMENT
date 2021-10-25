let count = 0; // initializes count variable
let countEL = document.getElementById("count-el");
let saveEL = document.getElementById("save-el");
saveEL.textContent += " ";

function increment() {
  count += 1;
  countEL.textContent = count;
}

function save() {
  let temp = count + " - ";
  saveEL.textContent += temp;
  count = 0;
  countEL.textContent = 0;
}
