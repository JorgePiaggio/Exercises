document.getElementById("randomIp").onclick = function () {
    /*var a = Math.floor(Math.random() * 256);
    var b = Math.floor(Math.random() * 2);
    var c = Math.floor(Math.random() * 2);
    var d = Math.floor(Math.random() * 2);
    location.href = `https://${a}.${b}.${c}.${d}`;*/
    location.href = `https://random-ize.com/random-youtube/goo-f.php`;
};

function heat(){
    travel();dro(); 
} 

/* universe */

function dro(){  

    var el = document.getElementById("universe")
    dynamics.animate(el, {
        rotateZ: 180
    }, {
    type: dynamics.linear,
    duration: 8500,
    complete: function() {
        dro3()
    }
    })
}

function dro2(){    
    var el = document.getElementById("universe")
    dynamics.animate(el, {
        rotateZ: 230
    }, {
    type: dynamics.linear,
    duration: 700,
    complete: function() {
         heat()
    }
    })
}

/* cat  -  why cant join these func? */

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
        dynamics.css(el, {
            filter: 'invert(100)'
        }),
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
        dynamics.css(el, {
            filter: 'saturate(90)'
        }),
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
        dynamics.css(el, {
            filter: 'saturate(4)'
        }),
        dro2()
    }
    })
}

/* broccoli */
var i = 0;

function travel(){
    var canv = document.getElementById("canvas");
    var br = document.getElementById("broccoli");
    var dx = Math.floor(Math.random() * 650 - 300);
    var dy = Math.floor(Math.random() * 650 - 300);
    var sca = Math.random() * 1;
    
    if(br.x > canv.width - 150 || br.x < 100 ){ dx*= -1;}
    if(br.y > canv.heigth - 150 || br.y < 0){ dy*= -1;}
    
    dynamics.animate(br, {
        translateY: dx,
        translateX: dy,
        scale: sca
    }, {
    type: dynamics.spring,
    duration: 1260,
    friction: 516,
    frequency: 943,
    anticipationSize: 580,
    anticipationStrength: 36,
    complete: function() {
        dynamics.css(br, {
            filter: 'blur(30px) drop-shadow(0 0 30px rgb(0, 155, 1)) drop-shadow(10px 2px 1px rgba(20, 1, 231, .7)) drop-shadow(-10px 2px 1px rgba(220, 15, 1, .7))',
        })
    }
    })

    dynamics.setTimeout(travel2, 500)
}

function travel2(){
    var br = document.getElementById("broccoli");
    var deg = Math.floor(Math.random() * 360);

    dynamics.animate(br, {
        rotateZ: deg
    }, {
    type: dynamics.linear,
    delay: 2500,
    duration: 1260,
    friction: 301,
    complete: function() {
        dynamics.css(br, {
            filter: 'drop-shadow(0 0 30px rgb(20, 155, 1))',
        })
        travel()
    }
    })
}

heat(); 
