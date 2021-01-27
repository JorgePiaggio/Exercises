<?php

function minimumDistances($a) {
    
    $min = -1;
    
    for($i = 0; $i < sizeof($a)-1; $i++){
        for($j = $i+1; $j < sizeof($a); $j++){
            if($a[$i] == $a[$j]){
                $aux = abs($i-$j);
                if($min < 0 || $aux < $min){
                    $min = $aux;
                }
            }
        }
    }
    
    return $min;
    
}?>

/*

The distance between two array values is the number of indices between them. Given a, find the minimum distance between any pair of equal elements in the array. If no such value exists, return -1.


minimumDistances has the following parameter(s):

    int a[n]: an array of integers

Returns

    int: the minimum distance found or -1 if there are no matching elements


Output Format

Print a single integer denoting the minimum d[i,j] in a. If no such value exists, print -1.

Sample Input

STDIN           Function
-----           --------
6               arr[] size n = 6
7 1 3 4 1 7     arr = [7, 1, 3, 4, 1, 7]

Sample Output

3


*/
