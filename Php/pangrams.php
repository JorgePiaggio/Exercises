<?php

function pangrams($s) {
    
    $t = strtolower($s);
    $str = str_split($t);
    $a = 'abcdefghijklmnopqrstuvwxyz';
    $alphabet = str_split($a);
    $count = 0;
    
    for($i = 0; $i < sizeof($str); $i++){
        if(in_array($str[$i], $alphabet)){
            $count++;
            $index = array_search($str[$i], $alphabet);  
            $alphabet[$index] = "";
        }
    }
    
    return $count == 26 ? "pangram" : "not pangram";
    
}?>


/*

A pangram is a string that contains every letter of the alphabet. Given a sentence determine whether it is a pangram in the English alphabet. Ignore case. Return either pangram or not pangram as appropriate.

Example

s = 'The quick brown fox jumps over the lazy dog'

The string contains all letters in the English alphabet, so return pangram.


pangrams has the following parameter(s):

    string s: a string to test


Returns

    string: either pangram or not pangram


Sample Input 0
We promptly judged antique ivory buckles for the next prize

Sample Output 0
pangram

Sample Explanation 0
All of the letters of the alphabet are present in the string.



Sample Input 1
We promptly judged antique ivory buckles for the prize

Sample Output 1
not pangram

Sample Explanation 0
The string lacks an x. 

*/

