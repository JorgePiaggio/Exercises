<?php

// OPTIMIZED ONE

function matrixRotation($matrix, $r) {
    
    $rows = sizeof($matrix);                // row end index
    $cols = sizeof($matrix[0]);             // col end index
    $n = 0;                                 // row start index
    $m = 0;                                 // col start index
    
    ///
    while($n+1 < $rows && $m+1 < $cols){   
        
        // skip 360 degrees rotations for each circle
        $completeRotation = ( ($rows-$n) * ($cols-$m)) - (($rows-$n-2) * ($cols-$n-2));
        $rot = $r % $completeRotation; 
        
        while($rot > 0){                                // one step circle rotation inside this (r -= 1)
            $upperLeft = $matrix[$n][$m];
            
            // <-                                       // rotate rows/cols
            for($i = $n; $i < $cols-1; $i++){           
                $matrix[$n][$i] = $matrix[$n][$i+1];                
            }
            // ^
            for($i = $n; $i < $rows-1; $i++){
                $matrix[$i][$cols-1] = $matrix[$i+1][$cols-1];
            }
            // ->
            for($i = $cols-1; $i > $n; $i--){
                $matrix[$rows-1][$i] = $matrix[$rows-1][$i-1];
            }
            // v
            for($i = $rows-1; $i > $n; $i--){
                $matrix[$i][$n] = $matrix[$i-1][$n];
            }
            
            $matrix[$n+1][$m] = $upperLeft;               // place last element
            $rot--;
        }
        $n++; $m++; $cols--; $rows--;   // jump one circle inside
        
    }
    
    // print rotated matrix 
    $rows = sizeof($matrix);
    $cols = sizeof($matrix[0]);    
    for($i = 0; $i < $rows; $i++){ 
        for($j = 0; $j < $cols; $j++){ 
            echo $matrix[$i][$j] . " "; 
        }
        echo "\n"; 
    }
}?>



<?php
/*********************************************************************************************************/
// NOT OPTIMIZED
/*

function matrixRotation($matrix, $r) {
    
    // skip useless 360 degrees turns
    $completeRotation = ( (sizeof($matrix) * sizeof($matrix[0])) - (sizeof($matrix)-2 * sizeof($matrix[0]) -2 ) * 2);
    $r %= $completeRotation;
    
    ///
    while($r > 0){
        $rows = sizeof($matrix);                // row end index
        $cols = sizeof($matrix[0]);             // col end index
        $n = 0;                                 // row start index
        $m = 0;                                 // col start index
        
        while($n < $rows && $m < $cols){        // one step rotation inside this (r = 1)
            
            if($n + 1 == $rows || $m + 1 == $cols) 
                break; 
                
            $upperLeft = $matrix[$n][$m];
            
            // <-
            for($i = $n; $i < $cols-1; $i++){
                $matrix[$n][$i] = $matrix[$n][$i+1];                
            }
            
            // ^
            for($i = $n; $i < $rows-1; $i++){
                $matrix[$i][$cols-1] = $matrix[$i+1][$cols-1];
            }
            
            // ->
            for($i = $cols-1; $i > $n; $i--){
                $matrix[$rows-1][$i] = $matrix[$rows-1][$i-1];
            }
            
            // v
            for($i = $rows-1; $i > $n; $i--){
                $matrix[$i][$n] = $matrix[$i-1][$n];
            }
            
            $matrix[$n+1][$m] = $upperLeft;
            
            $n++; $m++; $cols--; $rows--;
            
        }
        $r--;   
    }
    
    $rows = sizeof($matrix);
    $cols = sizeof($matrix[0]);
    
    
 // print rotated matrix 
    for ($i = 0; $i < $rows; $i++) 
    { 
        for ($j = 0; $j < $cols; $j++) 
        echo $matrix[$i][$j] . " "; 
        echo "\n"; 
    }
}?>
*/


/*

You are given a 2D matrix of dimension m x n and a positive integer r. You have to rotate the matrix r times and print the resultant matrix. Rotation should be in anti-clockwise direction.

It is guaranteed that the minimum of m and n will be even.


As an example rotate the Start matrix by 2:

Start         First           Second
 1 2 3 4       2  3  4  5      3  4  5  6
12 1 2 5  ->   1  2  3  6 ->   2  3  4  7
11 4 3 6      12  1  4  7      1  2  1  8
10 9 8 7      11 10  9  8     12 11 10  9


matrixRotation has the following parameter(s):

    matrix: a 2D array of integers
    r: an integer that represents the rotation factor


Output Format

Print each row of the rotated matrix as space-separated integers on separate lines.



Sample Input

4 4 2

1 2 3 4
5 6 7 8
9 10 11 12
13 14 15 16


Sample Output

3 4 8 12
2 11 10 16
1 7 6 15
5 9 13 14


*/


