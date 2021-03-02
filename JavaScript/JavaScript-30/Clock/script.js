const hourHand = document.querySelector('.hour_hand');
const minHand = document.querySelector('.min_hand');
const secHand = document.querySelector('.sec_hand');
const dayDiv = document.querySelector('.day');
const digitalDiv = document.querySelector('.digital');

function setDate(){
    const now = new Date();

    // analog
    const minutes = now.getMinutes();
    const minutesDegrees = ((minutes / 60) * 360) + 90;
    minHand.style.transform = `rotate(${minutesDegrees}deg)`;

    const hour = now.getHours();
    const hourDegrees = ((hour / 12) * 360) + ((minutes/60)*30) + 90;  //
    hourHand.style.transform = `rotate(${hourDegrees}deg)`;

    const seconds = now.getSeconds();
    const secondsDegrees = ((seconds / 60) * 360) + 90;
    secHand.style.transform = `rotate(${secondsDegrees}deg)`;

    //digital
    document.getElementById("digitalString").innerHTML = hour+":"+minutes+":"+seconds;  

}
function setDay(){
    const now2 = new Date();
    var options = { weekday: 'long'};
    const day = new Intl.DateTimeFormat('en-US', options).format(now2);
    document.getElementById("dayString").innerHTML = day;  
    console.log(day);
}

setDate();
setDay();
setInterval(setDate, 1000) // run setDate every second
setInterval(setDay, 1000) // run setDate every second

