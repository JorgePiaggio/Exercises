<?php

function twoStrings($s1, $s2) {

    for($i = 0; $i < strlen($s1); $i++){
        if(strpos($s2, $s1[$i]) > -1)
            return "YES";
    }
    return "NO";
    
}?>


/*

Given two strings, determine if they share a common substring. A substring may be as small as one character.

Example

s1 = 'and'
s2 = 'art'
These share the common substring 'a'.

s1 = 'be'
s2 = 'cat'
These do not share a substring.


twoStrings has the following parameter(s):

    string s1: a string
    string s2: another string

Returns

    string: either YES or NO


Output Format

For each pair of strings, return YES or NO.

Sample Input

2
hello
world
hi
world

Sample Output

YES
NO

*/
