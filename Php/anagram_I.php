<?php

function anagram($s) {
    if(strlen($s) % 2 != 0) return -1;
    
    $str1 = substr($s, 0, strlen($s) / 2 );         // divide string in 2
    $str2 = substr($s, strlen($s) / 2 );
    $diff = 0;
    
    for($i=0; $i < strlen($str1); $i++){            // delete repeated letters
        if(strpos($str2, $str1[$i]) > -1){
            $str2[strpos($str2, $str1[$i])] = " ";
            $str1[$i] = " ";
            
        }
    }
    
    $str1 = str_replace(" ", "", $str1);            // return number of non-repeated letters
    
    return strlen($str1) ;
}?>


/*

Two words are anagrams of one another if their letters can be rearranged to form the other word.
Given a string, split it into two contiguous substrings of equal length. Determine the minimum number of characters to change to make the two substrings into anagrams of one another.


Example

s = abccde

Break s into two parts: 'abc' and 'cde'. Note that all letters have been used, the substrings are contiguous and their lengths are equal. Now you can change 'a' and 'b' in the first substring to 'd' and 'e' to have 'dec' and 'cde' which are anagrams. Two changes were necessary.


anagram has the following parameter(s):

    string s: a string

Returns

    int: the minimum number of characters to change or -1.


Sample Input

6
aaabbb
ab
abc
mnop
xyyx
xaxbbbxx

Sample Output

3
1
-1
2
0
1

*/
