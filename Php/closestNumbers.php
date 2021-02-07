<?php

function closestNumbers($arr) {
    
    $min = max($arr);
    rsort($arr);
    $diff = array();
    
    for($i = 0; $i < sizeof($arr)-1; $i++){
        if($arr[$i] - $arr[$i+1] < $min){
            $min = $arr[$i] - $arr[$i+1];
            $diff = array();
            array_push($diff, $arr[$i]);
            array_push($diff, $arr[$i+1]);
        }else if($arr[$i] - $arr[$i+1] == $min){
            array_push($diff, $arr[$i]);
            array_push($diff, $arr[$i+1]);
        }
    }
    sort($diff);
    return $diff;

}
?>

/*

Sorting is useful as the first step in many different tasks. The most common task is to make finding things easier, but there are other uses as well. In this case, it will make it easier to determine which pair or pairs of elements have the smallest absolute difference between them.

Example

arr = [5,2,3,4,1]

Sorted, arr' = [1,2,3,4,5]. Several pairs have the minimum difference of 1: [(1,2),(2,3),(3,4),(4,5). Return the array [1,2,2,3,3,4,4,5].

Note
As shown in the example, pairs may overlap.

Given a list of unsorted integers, arr, find the pair of elements that have the smallest absolute difference between them. If there are multiple pairs, find them all.


closestNumbers has the following parameter(s):

    int arr[n]: an array of integers

Returns
- int[]: an array of integers as described


Output Format
Sample Input 0

10
-20 -3916237 -357920 -3620601 7374819 -7330761 30 6246457 -6461594 266854 

Sample Output 0

-20 30

Explanation 0
(30) - (-20) = 50, which is the smallest difference.


Sample Input 1

12
-20 -3916237 -357920 -3620601 7374819 -7330761 30 6246457 -6461594 266854 -520 -470 

Sample Output 1

-520 -470 -20 30

Explanation 1
(-470) - (-520) = 30 - (-20) = 50, which is the smallest difference.


*/
