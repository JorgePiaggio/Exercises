function heat(){
    dro();
}

function travel(){
    var canv = document.getElementById("canvas");
    var br = document.getElementById("broccoli");
    var dx = Math.floor(Math.random() * 650 - 300);
    var dy = Math.floor(Math.random() * 650 - 300);
    var deg = Math.floor(Math.random() * 360);
    var sca = Math.random() * 1;
    
    if(br.x > canv.width - 150 || br.x < 100 ){ dx*= -1;}
    if(br.y > canv.heigth - 150 || br.y < 0){ dy*= -1;}
    dynamics.animate(br, {
        translateY: dx,
        translateX: dy,
        rotateZ: deg,
        scale: sca
    }, {
    type: dynamics.easeIn,
    duration: 3555,
    friction: 222,
    complete: function() {
        travel()
    }
    })
}

function dro(){  
    var el = document.getElementById("universe")
    dynamics.animate(el, {
        rotateZ: 180
    }, {
    type: dynamics.linear,
    duration: 1500,
    complete: function() {
        dro2()
    }
    })
}

function dro2(){    
    var el = document.getElementById("universe")
    dynamics.animate(el, {
        rotateZ: 320
    }, {
    type: dynamics.linear,
    duration: 3500,
    complete: function() {
         dro3()
    }
    })
}

function dro3(){    
    var el = document.getElementById("cat")
    dynamics.animate(el, {
        translateX: 15
    }, {
    type: dynamics.linear,
    frequency: 300,
    duration: 11,
    friction: 200,
    complete: function() {
        dro4()
    }
    })
}

function dro4(){    
    var el = document.getElementById("cat")
    dynamics.animate(el, {
        translateY: 8
    }, {
    type: dynamics.linear,
    frequency: 300,
    duration: 11,
    friction: 200,
    complete: function() {
        dro5();
    }
    })
}

function dro5(){    
    var el = document.getElementById("cat")
    dynamics.animate(el, {
             translateX: 5

    }, {
    type: dynamics.linear,
    frequency: 300,
    duration: 11,
    friction: 200,
    complete: function() {
        dro6();
    }
    })
}

function dro6(){    
    var el = document.getElementById("cat")
    dynamics.animate(el, {  
        translateX: 0

    }, {
    type: dynamics.linear,
    frequency: 300,
    duration: 11,
    friction: 200,
    complete: function() {
        heat()
    }
    })
}
