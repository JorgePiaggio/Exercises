<?php

function cutTheSticks($arr) {

    $sticks = array();
    rsort($arr);

    while(true){

        array_push($sticks, sizeof($arr));
        
        for($i = 0; $i < sizeof($arr); $i++){
            if($arr[$i] == $arr[sizeof($arr)-1]){
                $arr = array_splice($arr, 0, $i);
            }else{
                $arr[$i] -= $arr[sizeof($arr)-1];
            }
        }
        
        if(sizeof($arr) == 0){
            break;
        }
    }
    //print_r($sticks);
    return $sticks;
}?>


/*

You are given a number of sticks of varying lengths. You will iteratively cut the sticks into smaller sticks, discarding the shortest pieces until there are none left. At each iteration you will determine the length of the shortest stick remaining, cut that length from each of the longer sticks and then discard all the pieces of that shortest length. When all the remaining sticks are the same length, they cannot be shortened so discard them.

Given the lengths of n sticks, print the number of sticks that are left before each iteration until there are none left.


Example

arr = [1,2,3]

The shortest stick length is 1, so cut that length from the longer two and discard the pieces of length 1. Now the lengths are arr=[1,2]. Again, the shortest stick is of length 1, so cut that amount from the longer stick and discard those pieces. There is only one stick left, arr=[1], so discard that stick. The number of sticks at each iteration are answer=[3,2,1].


cutTheSticks has the following parameter(s):

    int arr[n]: the lengths of each stick

Returns

    int[]: the number of sticks after each iteration

Sample Input 0

STDIN           Function
-----           --------
6               arr[] size n = 6
5 4 4 2 2 8     arr = [5, 4, 4, 2, 2, 8]

Sample Output 0

6
4
2
1


*/
