<?php

function equalizeArray($arr) {
    $max = 0;
    $temp = 1;
    sort($arr);

    for($i = 0; $i < sizeof($arr); $i++){   //count largest streak of equal letter
        if($arr[$i] == $arr[$i+1]){
            $temp++;
        }else{
            if($temp > $max){
                $max = $temp;
            }                
            $temp = 1;
        }
    }
    
    return sizeof($arr)-$max;       

}?>


/*

Given an array of integers, determine the minimum number of elements to delete to leave only elements of equal value.

Example

arr = [1,2,2,3]

Delete the 2 elements 1 and 3 leaving arr = [2,2]. If both twos plus either the 1 or the 3 are deleted, it takes 3 deletions to leave either [3] or [1]. The minimum number of deletions is 2.


equalizeArray has the following parameter(s):

    int arr[n]: an array of integers

Returns

    int: the minimum number of deletions required
    

Sample Input

STDIN       Function
-----       --------
5           arr[] size n = 5
3 3 2 1 3   arr = [3, 3, 2, 1, 3]


Sample Output

2   


*/
