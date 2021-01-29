<?php
# runningTimeOfAlgorithms

function runningTime($arr) {
    
    $shifts = 0;
    
    for($i = 0; $i < sizeof($arr); $i++){
        if($arr[$i] < $arr[$i-1]){
            $aux = $i ;  
            $num = $arr[$i];
            
            while($num < $arr[$aux-1]){
                $arr[$aux] = $arr[$aux-1];
                $aux--;
                $shifts++;			// count letter shifts
            }              
            $arr[$aux] = $num;      
        }
    }
    
    return $shifts;
}
?>


/*

In a previous challenge you implemented the Insertion Sort algorithm. It is a simple sorting algorithm that works well with small or mostly sorted data. However, it takes a long time to sort large unsorted data. To see why, we will analyze its running time.

Running Time of Algorithms
The running time of an algorithm for a specific input depends on the number of operations executed. The greater the number of operations, the longer the running time of an algorithm. We usually want to know how many operations an algorithm will execute in proportion to the size of its input, which we will call N.


What this means
The running time of the algorithm against an array of N elements is N^2 . For 2N elements, it will be 4N^2. Insertion Sort can work well for small inputs or if you know the data is likely to be nearly sorted, like check numbers as they are received by a bank. The running time becomes unreasonable for larger inputs.


Challenge
Can you modify your previous Insertion Sort implementation to keep track of the number of shifts it makes while sorting? The only thing you should print is the number of shifts made by the algorithm to completely sort the array. A shift occurs when an element's position changes in the array. Do not shift an element if it is not necessary.


runningTime has the following parameter(s):

    arr: an array of integers


Output the number of shifts it takes to sort the array.

Sample Input

5
2 1 3 1 2

Sample Output

4

Explanation

Iteration   Array      Shifts
0           2 1 3 1 2
1           1 2 3 1 2     1
2           1 2 3 1 2     0
3           1 1 2 3 2     2
4           1 1 2 2 3     1

Total                     4

*/
