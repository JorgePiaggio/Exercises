<?php

function beautifulTriplets($d, $arr) {
    sort($arr);
    $count = 0;
    
    for($i = 0; $i < sizeof($arr)-2; $i++){
        if(in_array($arr[$i]+$d, $arr)){        
            if(in_array($arr[$i]+$d*2, $arr)){
                $count++;
            }            
        }
    }
    
    return $count;
}?>


/*

Given a sequence of integers a, a triplet (a[i],a[j],a[k]) is beautiful if:
	* i < j < k
	* a[j] - a[i] = a[k] - a[j] = d

Given an increasing sequenc of integers and the value of d, count the number of beautiful triplets in the sequence.


beautifulTriplets has the following parameters:

    d: an integer
    arr: an array of integers, sorted ascending


Output Format

Print a single line denoting the number of beautiful triplets in the sequence.

Sample Input
3
1 2 4 5 7 8 10

Sample Output
3

Explanation
The input sequence is 1, 2, 4, 5, 7, 8, 10, and our beautiful difference d = 3. There are many possible triplets, but our only beautiful triplets are (1, 4, 7), (4, 7, 10) and (2, 5, 8) by value not index. 
*/
