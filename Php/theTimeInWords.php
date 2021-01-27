<?php

function timeInWords($h, $m) {
    
    $f = ['zero','one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen', 'twenty', 'twenty one', 'twenty two', 'twenty three', 'twenty four', 'twenty five', 'twenty six', 'twenty seven', 'twenty eight', 'twenty nine'];
        
    if($m <= 30){
        if($m == 0){
            return $f[$h]." o' clock";
        }else if($m == 15){
            return "quarter past ".$f[$h];
        }else if($m == 30){
            return "half past ".$f[$h];
        }else if($m == 1){
            return $f[$m]." minute past ".$f[$h];
        }else{
            return $f[$m]." minutes past ".$f[$h];
        }
    }else{
        if($m == 45){
            return "quarter to ".$f[$h+1];
        }else{
            $aux = 60 - $m;
            if($m == 1){
                return $f[$m]." minute to ".$f[$h];
            }else{
                return $f[$aux]." minutes to ".$f[$h+1];
            }
        }
    }
    
    
}?>


/*

Given the time in numerals we may convert it into words.

At minutes = 0, use o' clock. For 1 <= minutes, use past, and for 30 < minutes use to. Note the space between the apostrophe and clock in o' clock. Write a program which prints the time in words for the input given in the format described.


timeInWords has the following parameter(s):

    int h: the hour of the day
    int m: the minutes after the hour

Returns

    string: a time string as described


Sample Input 0

5
47

Sample Output 0

thirteen minutes to six

Sample Input 1

3
00

Sample Output 1

three o' clock

Sample Input 2

7
15

Sample Output 2

quarter past seven

*/
