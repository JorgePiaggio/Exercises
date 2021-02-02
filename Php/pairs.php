<?php

function pairs($k, $arr) {
    sort($arr);
    $count = 0;
    for($i = 0; $i < sizeof($arr); $i++){
        for($j = $i+1; $j < sizeof($arr); $j++){
            if(abs($arr[$i]-$arr[$j]) == $k){
                $count++;
            }else if(abs($arr[$i]-$arr[$j]) > $k)
                break;
        }
    }
    
    return $count;
}?>


/*

Given an array of integers and a target value, determine the number of pairs of array elements that have a difference equal to the target value.


Example

k = 1
arr = [1,2,3,4]

There are three values that differ by K = 1: 
   2-1 = 1,
   3-2 = 1, and 
   4-3 = 1.
   
Return 3.


pairs has the following parameter(s):

    int k: an integer, the target difference
    int arr[n]: an array of integers

Returns

    int: the number of pairs that satisfy the criterion


Constraints

each integer arr[i] will be unique


Sample Input

STDIN       Function
-----       --------
5 2         arr[] size n = 5, k =2
1 5 3 4 2   arr = [1, 5, 3, 4, 2]

Sample Output

3

*/
