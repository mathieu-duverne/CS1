
function hideShowInput() {
   let input = $('#inputAvatar')[0];
   let inputclick = $('#inputCLick')[0];
    if (input.style.display === "none") {
        input.style.display = "block";
        inputclick.style.display = "none";
    } else {
        input.style.display = "none";
        inputclick.style.display = "block";
    }
}