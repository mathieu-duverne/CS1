let button = document.querySelector("#button");
let counter = document.querySelector("#compteur");
function addone() {
    counter.textContent++;
}
button.addEventListener("click", addone);

