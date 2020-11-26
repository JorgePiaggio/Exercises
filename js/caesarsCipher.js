function rot13(str) {

    let phrase=str.toUpperCase().split("");
    let reg=/\w/g;
    let newPhrase="";
    var code="";
  
  
    for(var i=0; i < phrase.length; i++){
      if((phrase[i].match(reg))){
        code=phrase[i].charCodeAt()-13;
        // console.log(code);
        if(code < 65){
          code += 26;
        }else if(code > 90){
          code -= 26;
        }
        //console.log(code);
        newPhrase+=String.fromCharCode(code); 
           
      }else{
        code=phrase[i];
        newPhrase+=code;
      }
    }
  
      console.log(newPhrase);
  
  
    return newPhrase;
  }


/*
  rot13("SERR PBQR PNZC") should decode to FREE CODE CAMP
Passed

rot13("SERR CVMMN!") should decode to FREE PIZZA!
Passed

rot13("SERR YBIR?") should decode to FREE LOVE?
Passed

rot13("GUR DHVPX OEBJA SBK WHZCF BIRE GUR YNML QBT.") should decode to THE QUICK BROWN FOX JUMPS OVER THE LAZY DOG.*/