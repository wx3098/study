const timeElement = document.getElementById('time');
const start = document.getElementById("start");
const stop = document.getElementById("stop");
const reset = document.getElementById("reset");

let elapsed = 0;

start.addEventListener('click', function(e){
    let pre = new Date();
    setInterval(function() {
        const now = new Date();
        elapsed += now - pre;
        pre = now;
        console. log(elapsed);
    }, 10);
});

stop.addEventListener('click', function(e){
    clearInterval(intervalId);
});

reset.addEventListener('click', function(e){
    elapsed = 0;
});
