<?php

function makingAnagrams($s1, $s2) {
            
    for($i=0; $i < strlen($s1); $i++){            // delete repeated letters
        if(strpos($s2, $s1[$i]) > -1){
            $s2[strpos($s2, $s1[$i])] = " ";
            $s1[$i] = " ";
        }
    }
    
    $s1 = str_replace(" ", "", $s1);            // add remaining chars in both strings
    $s2 = str_replace(" ", "", $s2);
    
    return strlen($s1) + strlen($s2);
    
}?>

/*

Making Anagrams

We consider two strings to be anagrams of each other if the first string's letters can be rearranged to form the second string. In other words, both strings must contain the same exact letters in the same exact frequency. For example, bacdc and dcbac are anagrams, but bacdc and dcbad are not.

Alice is taking a cryptography class and finding anagrams to be very useful. She decides on an encryption scheme involving two large strings where encryption is dependent on the minimum number of character deletions required to make the two strings anagrams. Can you help her find this number?

Given two strings, s1 and s2, that may not be of the same length, determine the minimum number of character deletions required to make s1 and s2 anagrams. Any characters can be deleted from either of the strings.


makingAnagrams has the following parameter(s):

    s1: a string
    s2: a string


Output Format

Print a single integer denoting the minimum number of characters which must be deleted to make the two strings anagrams of each other.

Sample Input

cde
abc

Sample Output

4

*/



