<?php

function surfaceArea($A) {
    $surface = 0;
    for($i = 0; $i < sizeof($A); $i++){
        for($j = 0; $j < sizeof($A[0]); $j++){
            if($A[$i][$j] != 0){
                $surface += $A[$i][$j] * 4 + 2;     		//four sides * height + top & bottom
                if($A[$i-1][$j]){
                    $surface -= min($A[$i][$j], $A[$i-1][$j]) *2; 	// minus left side
                }                                               	// *2 coz sides r added twice
                if($A[$i][$j-1]){
                    $surface -= min($A[$i][$j], $A[$i][$j-1]) *2; 	// minus upper side
                }
            }
        }
    }
    return $surface;

}
?>

/*

Madison, is a little girl who is fond of toys. Her friend Mason works in a toy manufacturing factory . Mason has a 2D board A of size H x W with H rows and W columns. The board is divided into cells of size 1 x 1 with each cell indicated by it's coordinate [i,j]. The cell [i,j] has an integer Aij written on it. To create the toy Mason stacks Aij number of cubes of size 1 x 1 x 1 on the cell [i,j].

Given the description of the board showing the values of Aij and that the price of the toy is equal to the 3d surface area find the price of the toy.



Sample Input 0
1 1
1

Sample Output 0
6

Explanation 0
The surface area of 1 x 1 x 1 cube is 6.

Sample Input 1
3 3
1 3 4
2 2 3
1 2 4

Sample Output 1
60

Explanation 1
The sample input corresponds to the figure described in problem statement.
( https://s3.amazonaws.com/hr-assets/0/1509009918-091bdd4cba-1502631298-5cd3275ce9-img2.png )


*/


