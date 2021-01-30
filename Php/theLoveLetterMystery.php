<?php

function theLoveLetterMystery($s) {
    $diff = 0;
    
    $arr = str_split( substr($s, 0, floor(strlen($s)/2) ) );        // first half string
    $arr2 = str_split(strrev( substr($s, ceil(strlen($s)/2) ) ) );  // sec half reversed
    
    /*
    print_r( implode("",$arr)); echo "\n";
    print_r( implode("",$arr2)); echo "\n";
    */
    
    for($i = 0; $i < sizeof($arr); $i++){
        $diff += ( abs( ord($arr[$i]) - ord($arr2[$i])) );          // char diff betw arrays
    }
    
    return $diff;
}
?>

/*

James found a love letter that his friend Harry has written to his girlfriend. James is a prankster, so he decides to meddle with the letter. He changes all the words in the letter into palindromes.

To do this, he follows two rules:

    - He can only reduce the value of a letter by 1, i.e. he can change d to c, but he cannot change c to d or d to b.
    - The letter a may not be reduced any further.

Each reduction in the value of any letter is counted as a single operation. Find the minimum number of operations required to convert a given string into a palindrome.

For example, given the string s = 'cde', the following two operations are performed: cde → cdd → cdc.


theLoveLetterMystery has the following parameter(s):

    s: a string

All strings are composed of lower case English letters, *ascii[a-z], with no spaces.


Output Format

A single line containing the minimum number of operations corresponding to each test case.


Sample Input

4
abc
abcba
abcd
cba


Sample Output

2
0
4
2


*/
