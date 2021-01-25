<?php

function utopianTree($n) {
    $height = 1;   // initial height
    $cycles = 1;
    
    while($cycles <= $n){
        if($cycles % 2 == 0){            // summer + 1 height
            $height++;
        }else{                      // spring doubles height
            $height += $height;
        }
        $cycles++;
    }

    return $height;
}
?>


/*

The Utopian Tree goes through 2 cycles of growth every year. Each spring, it doubles in height. Each summer, its height increases by 1 meter.

A Utopian Tree sapling with a height of 1 meter is planted at the onset of spring. How tall will the tree be after n growth cycles?

For example, if the number of growth cycles is n = 5, the calculations are as follows:

Period  Height
0          1
1          2
2          3
3          6
4          7
5          14


utopianTree has the following parameter(s):

    int n: the number of growth cycles to simulate

Returns

    int: the height of the tree after the given number of cycles


Sample Input

0
1
4

Sample Output

1
2
7

*/
