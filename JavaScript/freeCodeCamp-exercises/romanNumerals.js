function convertToRoman(num) {

    // convert greek number to roman

    let romans= ["M", "CM", "D", "CD", "C", "XC", "L", "XL", "X", "IX", "V", "IV", "I"];
    let greeks=[1000, 900, 500, 400, 100, 90, 50, 40, 10, 9, 5, 4, 1];
    let romanNumeral="";

        
    for(var i=0; i<romans.length; i++){
        while(num >= greeks[i]){
            romanNumeral+=romans[i];
            num-=greeks[i];
        // console.log(romanNumeral);
        }
    }



    document.getElementById("romanNumeral").innerHTML=romanNumeral;

    return romanNumeral;
}