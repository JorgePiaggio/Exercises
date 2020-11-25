function palindrome(str) {

    let auxStr=str.toLowerCase().replace(/[^a-z0-9]/gi,'');
    let word=auxStr.split("");
    let half=word.length/2;
    let isPal=true;
    let result= "";

    for(var i=0; i<half; i++){
        if(word[i] != word[word.length-1-i]){
          isPal=false;
          break;
        }
      }
    
    if(isPal == true){
        result = str + " is a Palindrome";
    }else{
        result = str + " is not a Palindrome";
    }
    
    document.getElementById("demo").innerHTML=result;

    return isPal;
}