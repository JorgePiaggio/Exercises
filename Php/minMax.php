<?php

function miniMaxSum($arr) {

    $min = $arr[0];
    $max = $arr[0];
    $sum = 0;
    $minMax = array();
    
    for($i = 0; $i < sizeof($arr); $i++){
        if($arr[$i] < $min){
            $min = $arr[$i];
        }
        if($arr[$i] > $max){
            $max = $arr[$i];
        }
        $sum+= $arr[$i];
    }
    
    $minMax[0] = ($sum - $max);    
    $minMax[1] = ($sum - $min);
    
    echo ($sum - $max)." ".($sum - $min);
    
    return $minMax;
}
?>




/*

Given five positive integers, find the minimum and maximum values that can be calculated by summing exactly four of the five integers. Then print the respective minimum and maximum values as a single line of two space-separated long integers.

Print

Print two space-separated integers on one line: the minimum sum and the maximum sum of 4 of 5 elements.

Input Format

A single line of five space-separated integers.

Constraints

Output Format

Print two space-separated long integers denoting the respective minimum and maximum values that can be calculated by summing exactly four of the five integers. (The output can be greater than a 32 bit integer.)

Sample Input

1 2 3 4 5

Sample Output

10 14

*/

