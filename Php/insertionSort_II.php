<?php

function insertionSort2($n, $arr) {
    for($i = 0; $i < sizeof($arr); $i++){
        if($arr[$i] < $arr[$i-1]){
            $aux = $i ;  
            $num = $arr[$i];
            
            while($num < $arr[$aux-1]){
                $arr[$aux] = $arr[$aux-1];      // order one num at a time
                $aux--;
            }              
            $arr[$aux] = $num;                                   
        }
        
        if($i > 0){
            for($j = 0; $j < sizeof($arr); $j++){       // print sorted array
                echo $arr[$j]." ";
            } 
            echo "\n";
        }
    }
}
?>

/*

In Insertion Sort Part 1, you inserted one element into an array at its correct sorted position. Using the same approach repeatedly, can you sort an entire array?

Guideline: You already can place an element into a sorted array. How can you use that code to build up a sorted array, one element at a time? Note that in the first step, when you consider an array with just the first element, it is already sorted since there's nothing to compare it to.

In this challenge, print the array after each iteration of the insertion sort, i.e., whenever the next element has been inserted at its correct position. Since the array composed of just the first element is already sorted, begin printing after placing the second element.

Example.

n = 7
arr = [3,4,7,5,6,2,1]

Working from left to right, we get the following output:

3 4 7 5 6 2 1
3 4 7 5 6 2 1
3 4 5 7 6 2 1
3 4 5 6 7 2 1
2 3 4 5 6 7 1
1 2 3 4 5 6 7


insertionSort2 has the following parameter(s):

    int n: the length of arr

    int arr[n]: an array of integers


Prints

At each iteration, print the array as space-separated integers on its own line.


Sample Input

STDIN           Function
-----           --------
6               n = 6
1 4 3 5 6 2     arr = [1, 4, 3, 5, 6, 2]

Sample Output

1 4 3 5 6 2 
1 3 4 5 6 2 
1 3 4 5 6 2 
1 3 4 5 6 2 
1 2 3 4 5 6 

*/
