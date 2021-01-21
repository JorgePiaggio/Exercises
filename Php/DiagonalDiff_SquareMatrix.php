<?php 

function diagonalDifference($arr) {

    $diag1 = 0;
    $diag2 = 0;
    
    for($i = 0; $i < sizeof($arr); $i++){
        for($j = 0; $j < sizeof($arr); $j++){
            if($i == $j){
                $diag1 += $arr[$i][$j]; 
            }
        }
    }
    
    $k = 0;
    for($l = (sizeof($arr)-1); $l >= 0; $l--){
            $diag2 += $arr[$k][$l];
            $k++;
    }
    
    return abs($diag1 - $diag2);
}

?>

/*

Given a square matrix, calculate the absolute difference between the sums of its diagonals. 

Function description

diagonalDifference takes the following parameter:

    int arr[n][m]: an array of integers

Return

    int: the absolute diagonal difference

Output Format

Return the absolute difference between the sums of the matrix's two diagonals as a single integer.

*/
