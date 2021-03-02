const hourHand = document.querySelector('.hour_hand');
const minHand = document.querySelector('.min_hand');
const secHand = document.querySelector('.sec_hand');

function setDate(){
    const now = new Date();

    const minutes = now.getMinutes();
    const minutesDegrees = ((minutes / 60) * 360) + 90;
    minHand.style.transform = `rotate(${minutesDegrees}deg)`;

    const hour = now.getHours();
    const hourDegrees = ((hour / 12) * 360) + ((minutes/60)*30) + 90;  //
    hourHand.style.transform = `rotate(${hourDegrees}deg)`;

    const seconds = now.getSeconds();
    const secondsDegrees = ((seconds / 60) * 360) + 90;
    secHand.style.transform = `rotate(${secondsDegrees}deg)`;
}
setDate();
setInterval(setDate, 1000) // run setDate every second

