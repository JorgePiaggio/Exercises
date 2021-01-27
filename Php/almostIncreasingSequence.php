<?php

function almostIncreasingSequence($sequence) {
    
    if(sizeof($sequence) == 1 || sizeof($sequence) == 2){
        return true;
    }
    
    for($i = 0; $i < sizeof($sequence)-1; $i++){
        if($sequence[$i+1] <= $sequence[$i]){   // 1 mistake, two chances to evaluate
            $arr1 = $arr2 = $sequence;
            unset($arr1[$i]);                   // 2 arrays, remove i or i+1 
            unset($arr2[$i+1]);
            
            $arr3 = $arr4 = array();
            
            for($y = 0; $y < sizeof($sequence); $y++){      // correct indexes
                if($arr1[$y])
                    array_push($arr3, $arr1[$y]);
                if($arr2[$y])
                    array_push($arr4, $arr2[$y]);
            }                     
            
            $b1 = 0; 
            $b2 = 0;
                                                            // if both new subarrays are false, operation impossible
            for($j = 0; $j < sizeof($arr3)-1; $j++){  
                if($arr3[$j+1] <= $arr3[$j]){
                    $b1 = 1;              
                }
            }
            
            for($k = 0; $k < sizeof($arr4)-1; $k++){
                if($arr4[$k+1] <= $arr4[$k]){
                    $b2 = 1;              
                }
            }             
                       
           
            if($b1 + $b2 == 2){
                return false;
            }else{
                return true;
            }
            
        }
    }
}
?>


/*

Given a sequence of integers as an array, determine whether it is possible to obtain a strictly increasing sequence by removing no more than one element from the array.

Note: sequence a0, a1, ..., an is considered to be a strictly increasing if a0 < a1 < ... < an. Sequence containing only one element is also considered to be strictly increasing.

Example

    For sequence = [1, 3, 2, 1], the output should be
    almostIncreasingSequence(sequence) = false.

    There is no one element in this array that can be removed in order to get a strictly increasing sequence.

    For sequence = [1, 3, 2], the output should be
    almostIncreasingSequence(sequence) = true.

    You can remove 3 from the array to get the strictly increasing sequence [1, 2]. Alternately, you can remove 2 to get the strictly increasing sequence [1, 3].

Input/Output

    [execution time limit] 4 seconds (php)

    [input] array.integer sequence

    Guaranteed constraints:
    2 ≤ sequence.length ≤ 105,
    -105 ≤ sequence[i] ≤ 105.

    [output] boolean

    Return true if it is possible to remove one element from the array in order to get a strictly increasing sequence, otherwise return false.

*/
