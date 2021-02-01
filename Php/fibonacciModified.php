<?php
/* 
GMP
These functions allow for arbitrary-length integers to be worked with using the GNU MP library. 
*/
function fibonacciModified($t1, $t2, $n) {
    $arr = [gmp_init($t1), gmp_init($t2)];
    
    for($i = 2; $i < $n; $i++){
        array_push($arr, $arr[0]+pow($arr[1],2));
        array_shift($arr);
    }
    return $arr[1];

}?>

/*

Implement a modified Fibonacci sequence using the following definition:

    Given terms t[i] and t[i+1] where i ∈ (1, ∞), term t[i+2] is computed as:
    	
    			t[i+2] = t[i] + (t[i+1])^2

Given three integers, t1, t2, and n, compute and print the nth term of a modified Fibonacci sequence.

fibonacciModified has the following parameter(s):

    int t1: an integer
    int t2: an integer
    int n: the iteration to report

Returns

    int: the nth number in the sequence


Sample Input
0 1 5

Sample Output
5

Explanation
The first two terms of the sequence are t1 = 0 and t2 = 1, which gives us a modified Fibonacci sequence of {0,1,1,2,5,27,...}. The 5th term is 5. 

*/
