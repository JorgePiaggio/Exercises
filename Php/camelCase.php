<?php

function camelcase($s) {
    
    if($s == "")
        return 0;
        
    $words = 0;
    if($s[0] <= 'z' && $s[0] >= 'a' )          // if first is lower && letter
        $words = 1;
    
    for($i = 0 ; $i < strlen($s); $i++){
        if( $s[$i] < 'a' && $s[$i] >= 'A' )     // + uppercase letters
            $words++;
    }
    
    return $words;

}?>

/*


There is a sequence of words in CamelCase as a string of letters, s, having the following properties:

   - It is a concatenation of one or more words consisting of English letters.
   - All letters in the first word are lowercase.
   - For each of the subsequent words, the first letter is uppercase and rest of the letters are lowercase.

Given s, determine the number of words in s.


Example

s =oneTwoThree

There are 3 words in the string: 'one', 'Two', 'Three'.



camelcase has the following parameter(s):

    string s: the string to analyze


Returns

    int: the number of words in


Sample Input

saveChangesInTheEditor

Sample Output

5
*/

