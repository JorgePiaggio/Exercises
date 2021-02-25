function playSound(e){
    const audio = document.querySelector(`audio[data-key="${e.keyCode}"]`);
    const key = document.querySelector(`div[data-key="${e.keyCode}"]`);
    if(!audio) return; 
    audio.currentTime = 0; // rewind audio
    audio.play();
    key.classList.add('playing');   // add style to pressed key
}


function removeTransition(e){
    if(e.propertyName !== 'transform') return;
    this.classList.remove('playing'); // restore key style
}


const keys = Array.from(document.querySelectorAll('.key'));
keys.forEach( key => key.addEventListener('transitionend', removeTransition) );
window.addEventListener('keydown', playSound);


/* buttons for touch devices */
function touch(s){
    const audio = document.querySelector(`audio[data-key="${s}"]`);
    const key = document.querySelector(`div[data-key="${s}"]`);
    if(!audio) return; 
    audio.currentTime = 0; // rewind audio
    audio.play();
    key.classList.add('playing');   // add style to pressed key
}