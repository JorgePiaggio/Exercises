<?php

function repeatedString($s, $n) {

    $count = 0;
    $str = str_split($s);
    $countExtra = 0;
    
    for($i = 0; $i < sizeof($str); $i++){       // count a's in string
        if($str[$i] == 'a'){
            $count++;
        }
    }
    
    if(($n % sizeof($str)) != 0){               // count a's in last substring
        for($i = 0; $i < $n % sizeof($str); $i++){ 
            if($str[$i] == 'a'){
                $countExtra++;
            }
        }
    }
                        
                        // add it all, multiply * repetitions
    return ($count * floor($n / sizeof($str))) + $countExtra;       

}?>


/*

There is a string, s, of lowercase English letters that is repeated infinitely many times. Given an integer, n, find and print the number of letter a's in the first n letters of the infinite string.

Example

s = 'abcac'
n = 10

The substring we consider is 'abcacabcac', the first 10 characters of the infinite string. There are 4 occurrences of a in the substring.


repeatedString has the following parameter(s):

    s: a string to repeat
    n: the number of characters to consider

Returns

    int: the frequency of a in the substring


Sample Input 0

aba
10

Sample Output 0

7

*/
