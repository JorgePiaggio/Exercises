<?php

function divisibleSumPairs($n, $k, $ar) {

    $pair = 0;
    
    for($i = 0; $i < sizeof($ar); $i++){
        for($j = 0; $j < sizeof($ar); $j++){
            if($i != $j){
                if( ($i < $j) && (($ar[$i]+$ar[$j]) % $k == 0) ){
                    $pair++;
                }
            }
        }
    }

    return $pair;

}?>



/*

Given an array of integers and a positive integer k, determine the number of pairs (i, j) where i < j and ar[i] + ar[j] is divisible by k.



divisibleSumPairs has the following parameter(s):

    int n: the length of array ar
    int ar[n]: an array of integers
    int k: the integer divisor

Returns
- int: the number of pairs


Sample Input

STDIN           Function
-----           --------
6 3             n = 6, k = 3
1 3 2 6 1 2     ar = [1, 3, 2, 6, 1, 2]

Sample Output

5

*/
