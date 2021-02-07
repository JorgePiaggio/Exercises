<?php

function lilysHomework($arr) {
    $count = $rcount = 0;
    $sorted = $rsorted = $rarr = $arr; 
    sort($sorted); 
    rsort($rsorted);
    
    for($i = 0; $i < sizeof($arr); $i++){
        if($sorted[$i] != $arr[$i]){
            $index = array_search($sorted[$i], $arr);
            $aux = $arr[$i];
            $arr[$i] = $sorted[$i];
            $arr[$index] = $aux;
            $count++;
        }
        if($rsorted[$i] != $rarr[$i]){
            $rindex = array_search($rsorted[$i], $rarr);
            $raux = $rarr[$i];
            $rarr[$i] = $rsorted[$i];
            $rarr[$rindex] = $raux;
            $rcount++;
        }
    }
    
    return $count <= $rcount ? $count : $rcount;
}?>


/*

Whenever George asks Lily to hang out, she's busy doing homework. George wants to help her finish it faster, but he's in over his head! Can you help George understand Lily's homework so she can hang out with him?

Consider an array of n distinct integers, arr = [a[0], a[1],...,a[n-1]]. George can swap any two elements of the array any number of times. An array is beautiful if the sum of |arr[i] - arr[i-1]| among 0 < i < n is minimal.

Given the array arr, determine and return the minimum number of swaps that should be performed in order to make the array beautiful.

For example, arr = [7,15,12,3]. One minimal array is [3,7,12,15]. To get there, George performed the following swaps:

Swap      Result
      [7, 15, 12, 3]
3 7   [3, 15, 12, 7]
7 15  [3, 7, 12, 15]

It took 2 swaps to make the array beautiful. This is minimal among the choice of beautiful arrays possible.


lilysHomework has the following parameter(s):

    arr: an integer array


Output Format

Return the minimum number of swaps needed to make the array beautiful.

Sample Input

4
2 5 3 1

Sample Output

2

Explanation

Let's define array B = [1,2,3,5] to be the beautiful reordering of arr. The sum of the absolute values of differences between its adjacent elements is minimal among all permutations and only two swaps (1 with 2 and then 2 with 5) were performed.
*/
