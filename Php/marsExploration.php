<?php

function marsExploration($s) {
    
    $arr = ['S', 'O', 'S'];
    $index = 0;
    $diff = 0;
    
    for($i = 0; $i < strlen($s); $i++){
        if($s[$i] != $arr[$index]){
            $diff++;
        }
        
        $index++;
        if($index > 2){
            $index = 0;
        }
    }

    return $diff;
}?>

/*

A space explorer's ship crashed on Mars! They send a series of SOS messages to Earth for help.

Letters in some of the SOS messages are altered by cosmic radiation during transmission. Given the signal received by Earth as a string, s, determine how many letters of the SOS message have been changed by radiation.


Example

s = 'SOSTOT'
The original message was SOSSOS. Two of the message's characters were changed in transit.


marsExploration has the following parameter(s):

    string s: the string as received on Earth


Returns

    int: the number of letters changed during transmission


Sample Input 0

SOSSPSSQSSOR


Sample Output 0

3

*/

