<?php

function countSubstrings($s, $queries) {
    $results = array();
    
    for($i = 0; $i < sizeof($queries); $i++){
        $subs = array();
        for($j = $queries[$i][0]; $j <= $queries[$i][1]; $j++){
            $str = "";
            $str .= $s[$j];
            if(!in_array($str, $subs)){
                array_push($subs, $str);
            }
            for($k = $j+1; $k <= $queries[$i][1]; $k++){
                $str .= $s[$k];
                if(!in_array($str, $subs)){
                    array_push($subs, $str);
                }
            }
        }
        array_push($results, sizeof($subs));
        
        /*for($x = 0; $x < sizeof($subs); $x++){
            echo $subs[$x]."\n";
        }echo "\n---------------\n";*/
    }

    return $results;
}?>


/*

Consider a string of n characters, s, of where each character is indexed from 0 to n-1.

You are given q queries in the form of two integer indices: left and right. For each query, count and print the number of different substrings of s in the inclusive range between left and right.

Note: Two substrings are different if their sequence of characters differs by at least one. For example, given the string s=aab, substrings S[0,0]=a and S[1,1]=a are the same but substrings s[0,1]=aa and s[1,2]=ab are different.


Output Format

For each query, print the number of different substrings in the inclusive range between index left and index right on a new line.

Sample Input 0

5 5
aabaa
1 1
1 4
1 1
1 4
0 2

Sample Output 0

1
8
1
8
5

Explanation 0

Given s=aabaa, we perform the following q=5 queries:

    	1 1: The only substring of a is itself, so we print 1 on a new line.
	1 4: The substrings of abaa are a, b, ab, ba, aa, aba, baa, and abaa, so we print 8 on a new line.
	1 1: The only substring of a is itself, so we print 1 on a new line.
	1 4: The substrings of abaa are a, b, ab, ba, aa, aba, baa, and abaa, so we print 8 on a new line.
	0 2: The substrings of aab are a, b, aa, ab, and aab, so we print 5 on a new line.


*/
