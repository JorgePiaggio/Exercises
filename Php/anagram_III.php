<?php

function gameOfThrones($s) {

    $letters = array();
    
    for($i = 0; $i < strlen($s); $i++){                 // count all letters
        if(!array_key_exists($s[$i], $letters)){
            $letters[$s[$i]] = 1;
        }else{
            $letters[$s[$i]]++;
        }
    }
    
    $odds = 0;
    
    foreach($letters as $l){           // if more than 1 is odd, anagram is not possible
        if($l % 2 != 0){
            $odds++;
        }
        if($odds > 1){
            return "NO";
        }
    }
    
    return "YES";

}?>

/*
Game of Thrones

Dothraki are planning an attack to usurp King Robert's throne. King Robert learns of this conspiracy from Raven and plans to lock the single door through which the enemy can enter his kingdom.

But, to lock the door he needs a key that is an anagram of a palindrome. He starts to go through his box of strings, checking to see if they can be rearranged into a palindrome. Given a string, determine if it can be rearranged into a palindrome. Return the string YES or NO.

Example

s = 'aabbccdd'

One way this can be arranged into a palindrome is 'abcddcba'. Return YES.


gameOfThrones has the following parameter(s):

    string s: a string to analyze

Returns

    string: either YES or NO


Sample Input 0
aaabbbb

Sample Output 0
YES

Explanation 0
A palindromic permutation of the given string is bbaaabb.

Sample Input 1
cdefghmnopqrstuvw

Sample Output 1
NO

Explanation 1
Palindromes longer than 1 character are made up of pairs of characters. There are none here. 

*/
