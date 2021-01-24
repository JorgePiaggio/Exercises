<?php

function catAndMouse($x, $y, $z) {

    $result;
    $catA= abs($z - $x);
    $catB= abs($z - $y);
       
    if($catA == $catB){
        $result = "Mouse C";
    }else if($catB < $catA){
        $result = "Cat B";
    }else{
        $result = "Cat A";
    }

    return $result;
}?>


/*

Two cats and a mouse are at various positions on a line. You will be given their starting positions. Your task is to determine which cat will reach the mouse first, assuming the mouse does not move and the cats travel at equal speed. If the cats arrive at the same time, the mouse will be allowed to move and it will escape while they fight.

You are given q queries in the form of x, y, and z representing the respective positions for cats and A, B and for mouse C. Complete the function catAndMouse to return the appropriate answer to each query, which will be printed on a new line.

    	- If cat A catches the mouse first, print Cat A.
	- If cat B catches the mouse first, print Cat B.
    	- If both cats reach the mouse at the same time, print Mouse C as the two cats fight and mouse escapes.


catAndMouse has the following parameter(s):

	int x: Cat A's position
	int y: Cat B's position
	int z: Mouse C's position

Returns

    string: Either 'Cat A', 'Cat B', or 'Mouse C'


Sample Input 0

2
1 2 3
1 3 2

Sample Output 0

Cat B
Mouse C

*/

