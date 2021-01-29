<?php

function hackerrankInString($s) {

    $str = 'hackerrank';
    $hacker = str_split($str);
    $input = str_split($s);
    $count = 0;
    $index = 0;
    
    for($i = 0; $i < sizeof($input); $i++){
        if($input[$i] == $hacker[$index]){
            $index++;
            $count++;
        }
    }
    
    if($count == sizeof($hacker)){
        return "YES";
    }else return "NO";
    

}?>

/*

We say that a string contains the word hackerrank if a subsequence of its characters spell the word hackerrank. Remeber that a subsequence maintains the order of characters selected from a sequence.

More formally, let p[0], p[1] ,..., p[9] be the respective indices of h, a, c, k, e, r, r, a, n, k in string s. If p[0] < p[1] < p[2] < ... < p[9] is true, then s contains hackerrank.

For each query, print YES on a new line if the string contains hackerrank, otherwise, print NO.


Example

s = haacckkerrannkk
This contains a subsequence of all of the characters in the proper order. Answer YES

s = haacckkerannk
This is missing the second 'r'. Answer NO.

s = hccaakkerrannkk
There is no 'c' after the first occurrence of an 'a', so answer NO.



hackerrankInString has the following parameter(s):

    string s: a string


Returns

    string: YES or NO


Sample Input 0

2
hereiamstackerrank
hackerworld


Sample Output 0

YES
NO

*/
