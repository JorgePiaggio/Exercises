<?php

// Complete the cavityMap function below.
function cavityMap($grid) {
    
    for($i = 1; $i < sizeof($grid) - 1 ; $i++){
        for($j = 1; $j < sizeof($grid) - 1 ; $j++){
            if($grid[$i][$j] > $grid[$i-1][$j] && $grid[$i][$j] > $grid[$i+1][$j] && $grid[$i][$j] > $grid[$i][$j-1] && $grid[$i][$j] > $grid[$i][$j+1]){
                                $grid[$i][$j] = "X";
                     
            }
            
            /* OR

            if($grid[$i][$j] > $grid[$i-1][$j]){
                if($grid[$i][$j] > $grid[$i+1][$j]){
                    if($grid[$i][$j] > $grid[$i][$j-1]){
                        if($grid[$i][$j] > $grid[$i][$j+1]){
                                $grid[$i][$j] = "X";
                        }
                    }
                }
            }
            
            */
        }
    }
    return $grid;
}?>


/*

You are given a square map as a matrix of integer strings. Each cell of the map has a value denoting its depth. We will call a cell of the map a cavity if and only if this cell is not on the border of the map and each cell adjacent to it has strictly smaller depth. Two cells are adjacent if they have a common side, or edge.

Find all the cavities on the map and replace their depths with the uppercase character X.

Example

The grid:

989
191
111

Return:

989
1X1
111

The center cell was deeper than those on its edges: [8,1,1,1]. The deep cells in the top two corners do not share an edge with the center cell, and none of the border cells is eligible.


cavityMap has the following parameter(s):

    string grid[n]: each string represents a row of the grid


Returns

    string{n}: the modified grid


Sample Input

STDIN   Function
-----   --------
4       grid[] size n = 4
1112    grid = ['1112', '1912', '1892', '1234']
1912
1892
1234

Sample Output

1112
1X12
18X2
1234


*/
