<?php


function kangaroo($x1, $v1, $x2, $v2) {
    $jumps = 1;
    $k1 = $x1;				// kangaroo 1 - starting point
    $k2 = $x2;				// kangaroo 2 - starting point
    
    while($jumps < 10000){
        $k1 += $v1;			// JUMP!
        $k2 += $v2;
        $jumps++;
        if($k1 == $k2){
            return "YES";
        }    
    }
    
    return "NO";
    
}?>

/*

You are choreographing a circus show with various animals. For one act, you are given two kangaroos on a number line ready to jump in the positive direction (i.e, toward positive infinity).

   	- The first kangaroo starts at location x1 and moves at a rate of v1 meters per jump.
	- The second kangaroo starts at location x2 and moves at a rate of v2 meters per jump.

You have to figure out a way to get both kangaroos at the same location at the same time as part of the show. If it is possible, return YES, otherwise return NO.


kangaroo has the following parameter(s):

    x1, v1: integers, starting position and jump distance for kangaroo 1
    x2, v2: integers, starting position and jump distance for kangaroo 2


Output Format

Print YES if they can land on the same location at the same time; otherwise, print NO.

Note: The two kangaroos must land at the same location after making the same number of jumps.


Sample Input 0

0 3 4 2


Sample Output 0

YES

*/
