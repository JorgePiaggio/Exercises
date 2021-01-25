<?php

function squares($a, $b) {

    $squares = 0;
    
    $begin = 1;
    
    while(pow($begin,2) < $a){
        $begin++;
    }
    while(pow($begin,2) <= $b){
        $begin++;
        $squares++;
    }
    
    echo $squares;
    return $squares;
}?>

/*

Watson likes to challenge Sherlock's math ability. He will provide a starting and ending value that describe a range of integers, inclusive of the endpoints. Sherlock must determine the number of square integers within that range.

Note: A square integer is an integer which is the square of an integer, e.g. 1,4,9,16,25.


Example

a=24
b=49
There are three square integers in the range: 25, 36 and 49. Return 3.


squares has the following parameter(s):

    int a: the lower range boundary
    int b: the upper range boundary

Returns

    int: the number of square integers in the range


Sample Input

3 9
17 24

Sample Output

2
0

*/
