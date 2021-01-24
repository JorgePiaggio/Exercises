<?php

function getMoneySpent($keyboards, $drives, $b) {
    
    $options = array();
    
    for($i = 0; $i < sizeof($keyboards); $i++){
        for($j = 0; $j < sizeof($drives); $j++){
            if($keyboards[$i] + $drives[$j] <= $b){
                array_push($options, $keyboards[$i] + $drives[$j]);
            }
        }
    }
    
    $max = -1;
    for($k = 0; $k < sizeof($options); $k++){
        if($options[$k] > $max){
            $max = $options[$k];
        }
    }

    return $max;
}?>


/*

A person wants to determine the most expensive computer keyboard and USB drive that can be purchased with a give budget. Given price lists for keyboards and USB drives and a budget, find the cost to buy them. If it is not possible to buy both items, return -1.


getMoneySpent has the following parameter(s):

    int keyboards[n]: the keyboard prices
    int drives[m]: the drive prices
    int b: the budget

Returns

    int: the maximum that can be spent, or 

    if it is not possible to buy both items


Sample Input 0

10 2 3
3 1
5 2 8

Sample Output 0

9

*/
