<?php

function countApplesAndOranges($s, $t, $a, $b, $apples, $oranges) {

/*
$s and $t are house limits
$a location of apple tree
$b location of orange tree
$apples array of apples distances
$oranges array of orange distances
*/

    $app = 0;
    $ora = 0;
    
    for($i = 0; $i < sizeof($apples); $i++){
        if($a + $apples[$i] >= $s && $a + $apples[$i] <= $t){
            $app++;
        }
    }
    for($i = 0; $i < sizeof($oranges); $i++){
        if($b + $oranges[$i] >= $s && $b + $oranges[$i] <= $t){
            $ora++;
        }
    }


    echo $app. "\n";
    echo $ora;
}?>




/*

Sam's house has an apple tree and an orange tree that yield an abundance of fruit. Using the information given below, determine the number of apples and oranges that land on Sam's house.


    The red region denotes the house, where s is the start point, and t is the endpoint. The apple tree is to the left of the house, and the orange tree is to its right.
Assume the trees are located on a single point, where the apple tree is at point a, and the orange tree is at point b.
When a fruit falls from its tree, it lands d units of distance from its tree of origin along the x-axis. *A negative value of d means the fruit fell d units to the tree's left, and a positive value of d means it falls d units to the tree's right. *


Given the value of d for m apples and n oranges, determine how many apples and oranges will fall on Sam's house (i.e., in the inclusive range [s,t])?

countApplesAndOranges has the following parameter(s):

    s: integer, starting point of Sam's house location.
    t: integer, ending location of Sam's house location.
    a: integer, location of the Apple tree.
    b: integer, location of the Orange tree.
    apples: integer array, distances at which each apple falls from the tree.
    oranges: integer array, distances at which each orange falls from the tree.

Input Format

The first line contains two space-separated integers denoting the respective values of
and .
The second line contains two space-separated integers denoting the respective values of and .
The third line contains two space-separated integers denoting the respective values of and .
The fourth line contains space-separated integers denoting the respective distances that each apple falls from point .
The fifth line contains space-separated integers denoting the respective distances that each orange falls from point


Output Format

Print two integers on two different lines:

    The first integer: the number of apples that fall on Sam's house.
    The second integer: the number of oranges that fall on Sam's house.

Sample Input 0

7 11
5 15
3 2
-2 2 1
5 -6

Sample Output 0

1
1

*/
