<?php

function sockMerchant($n, $ar) {

    $pairs = 0;
    $socks = array();
    
    //join socks with same number
    for($i = 0; $i < sizeof($ar); $i++){
        if(array_key_exists($ar[$i],$socks)){
            $socks[$ar[$i]]+=1;
        }else{
            $socks[$ar[$i]]=1;
        }
    }
    //print_r($socks);
    
    
    //count pairs
    foreach($socks as $s){
        $pairs += floor($s/2);
    }

    return $pairs;
    
}?>


/*

There is a large pile of socks that must be paired by color. Given an array of integers representing the color of each sock, determine how many pairs of socks with matching colors there are.

Example

n = 7
ar = [1,2,1,2,1,3,2]

There is one pair of color 1 and one of color 2. There are three odd socks left, one of each color. The number of pairs is 2.


sockMerchant has the following parameter(s):

    int n: the number of socks in the pile
    int ar[n]: the colors of each sock

Returns

    int: the number of pairs


Sample Input

STDIN                       Function
-----                       --------
9                           n = 9
10 20 20 10 10 30 50 10 20  ar = [10, 20, 20, 10, 10, 30, 50, 10, 20]


Sample Output

3

*/
