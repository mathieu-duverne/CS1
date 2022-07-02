document.addEventListener('keypress', function keyLog(event){
    let log = document.getElementById('keylogger');
    log.value += event.key;
})



