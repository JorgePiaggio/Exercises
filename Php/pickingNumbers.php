<?php

function pickingNumbers($a) {

    $count = array();
    
    // order & count items
    for($i = 0; $i < sizeof($a); $i++){
        if(array_key_exists( ($a[$i]), $count)){
            $count[$a[$i]] += 1;
        }else{
            $count[$a[$i]] = 1;
        }
    }

    $keys = array_keys($count);
    $subarrayLength = 0;

    // get longest subarray
    foreach($keys as $key){
        if(array_key_exists( ($key + 1), $count)){
            if( ($count[$key] + $count[$key + 1]) > $subarrayLength){
                $subarrayLength = $count[$key] + $count[$key + 1];
            }
        }else if($count[$key] > $subarrayLength){
            $subarrayLength = $count[$key];
        }
    }

    return $subarrayLength;
    
}?>



/*

Given an array of integers, find the longest subarray where the absolute difference between any two elements is less than or equal to 1.

Example

a = [1,1,2,2,4,4,5,5,5]

There are two subarrays meeting the criterion: [1,1,2,2] and [4,4,5,5,5]. The maximum length subarray has 5 elements.


pickingNumbers has the following parameter(s):

    int a[n]: an array of integers


Returns

    int: the length of the longest subarray that meets the criterion


Sample Input 0

6
4 6 5 3 3 1

Sample Output 0

3

*/
