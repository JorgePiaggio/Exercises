<?php

function encryption($s) {

    $str = trim($s);                                        // remove spaces
    $row = floor(sqrt(strlen($str)));   // matrix size
    $col = $row;
    $encrypted = "";

    if(pow($row, 2) < strlen($str))     // adjust size to fit str
        $col++;
    if($row*$col < strlen($str)) 
        $row++;

    $matrix = array();    
    $index = 0;
    
    for($i = 0; $i < $row; $i++){       // str to matrix
        $matrix[$i] = array();
        for($j = 0; $j < $col; $j++){
            $matrix[$i][$j] = $str[$index];
            $index++;
        }
    }    

    for($i = 0; $i < $col; $i++){       // matrix read top to bottom 
        for($j = 0; $j < $row; $j++){
            $encrypted .= $matrix[$j][$i];
            $index++;
        }$encrypted .= " ";
    }  
    
    while(strlen($encrypted) < $row*$col){  // add spaces to match length
        $encrypted .= " ";
    }
    
    return $encrypted;    
}
?>



/*

An English text needs to be encrypted using the following encryption scheme.
First, the spaces are removed from the text. Let L be the length of this text.
Then, characters are written into a grid, whose rows and columns have the following constraints:

	[√L] <= row <= column <= {√L}, where [x] is floor function and {x} is ceil function 


Example
s = 'if man was meant to stay on the ground god woulad have given us roots'

After removing spaces, the string is 54 characters long. √54 is between 7 and 8, so it is written in the form of a grid with 7 rows and 8 columns.

ifmanwas  
meanttos          
tayonthe  
groundgo  
dwouldha  
vegivenu  
sroots

	- Ensure that rows x columns >= L
	- If multiple grids satisfy the above conditions, choose the one with the minimum area, i.e. rows x columns.

The encoded message is obtained by displaying the characters of each column, with a space between column texts. The encoded message for the grid above is:

imtgdvs fearwer mayoogo anouuio ntnnlvt wttddes aohghn sseoau


Returns

    string: the encrypted string


Constraints

contains characters in the range ascii[a-z] and space, ascii(32).


Sample Input
haveaniceday

Sample Output 0
hae and via ecy

Explanation 0

L = 12, √12 is between 3 and 4.
Rewritten with 3 rows and 4 columns:

have
anic
eday

*/
