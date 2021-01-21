<?php

function staircase($n) {
    
    $string = array();
    $count = 0;

    while($count <= $n){
        array_push($string, " ");
        $count++;
    }
    
    $count = $n - 1;
    while($count >= 0){
        $string[$count] = "#";
        echo implode($string)."\n";
        $count--;
    }
}
?>


/*
This is a staircase of size 4

   #
  ##
 ###
####

It is drawn using # symbols and spaces. The last line is not preceded by any spaces.

Write a program that prints a staircase of size n

staircase has the following parameter(s):

    int n: an integer

Print

Print a staircase as described above.

Constraints

Output Format

Print a staircase of size n using # symbols and spaces.

Note: The last line must have 0 spaces in it.

Sample Input

6 

Sample Output

     #
    ##
   ###
  ####
 #####
######

*/

