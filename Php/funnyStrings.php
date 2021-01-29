<?php

function funnyString($s) {
    
    $r = strrev($s);
    
    $diff1 = array();
    $diff2 = array();

    for($i = 1; $i < strlen($s); $i++){
        $d1 = abs(ord($s[$i]) - ord($s[$i-1]));
        $d2 = abs(ord($r[$i]) - ord($r[$i-1]));
        array_push( $diff1, $d1 );
        array_push( $diff2, $d2 );
    }

    for($j = 0; $j < sizeof($diff1); $j++){
        if($diff1[$j] != $diff2[$j])
            return "Not Funny";
    }
    
    return "Funny";
}?>


/*

In this challenge, you will determine whether a string is funny or not. To determine whether a string is funny, create a copy of the string in reverse e.g. abc -> cba. Iterating through each string, compare the absolute difference in the ascii values of the characters at positions 0 and 1, 1 and 2 and so on to the end. If the list of absolute differences is the same for both strings, they are funny.

Determine whether a give string is funny. If it is, return Funny, otherwise return Not Funny.


Example

s= 'lmnop'

The ordinal values of the charcters are [108,108,110,111,112]. Sreverse = 'ponml' and the ordinals are [112,111,110,109,108]. The absolute differences of the adjacent elements for both strings are [1,1,1,1], so the answer is Funny.


funnyString has the following parameter(s):

    string s: a string to test


Returns

    string: either Funny or Not Funny


Sample Input

STDIN   Function
-----   --------
2       q = 2
acxz    s = 'acxz'
bcxz    s = 'bcxz'


Sample Output

Funny
Not Funny

*/
