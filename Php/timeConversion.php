<?php

function timeConversion($s) {
   
   $time;
  
    if(strpos($s, "A") != false){
        $time = substr($s, 0, 8);
        if(substr($s, 0, 2) == "12"){
            $time = "00".substr($s, 2, 6);
        }
    }else{
        $aux = substr($s, 0, 2);
        
        if($aux != 12){
            $aux += 12;
        }
        $time = $aux.substr($s, 2, 6);
    }
   
      
   return $time;
}
?>


/*

Given a time in 12-hour AM/PM format, convert it to military (24-hour) time.

Note: - 12:00:00AM on a 12-hour clock is 00:00:00 on a 24-hour clock.
- 12:00:00PM on a 12-hour clock is 12:00:00 on a 24-hour clock.


timeConversion has the following parameter(s):

    string s: a time in 12 hour format

Returns

    string: the time in 24 hour format

Input Format

A single string s that represents a time in 12-hour clock format 

Constraints

    All input times are valid

Sample Input 0

07:05:45PM

Sample Output 0

19:05:45

*/
