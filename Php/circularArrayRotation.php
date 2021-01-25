<?php

function circularArrayRotation($a, $k, $queries) {
    $subArray = array();
    $k = ($k % sizeof($a));
    
    $aux = array_splice($a, sizeof($a) - $k);       // cut array from beginning to length - rotations
    array_splice($aux, count($aux), 0, $a);    	// paste cut subarray in the end	

    //print_r($aux);
    
    for($i = 0; $i < sizeof($queries); $i++){   // pick indexes
        $subArray[$i] = $aux[$queries[$i]];
    }

    return $subArray;
    
}?>


/*

John Watson knows of an operation called a right circular rotation on an array of integers. One rotation operation moves the last array element to the first position and shifts all remaining elements right one. To test Sherlock's abilities, Watson provides Sherlock with an array of integers. Sherlock is to perform the rotation operation a number of times then determine the value of the element at a given position.
For each array, perform a number of right circular rotations and return the values of the elements at the given indices.


Example

a = [3,4,5]
k = 2
queries = [1,2]
Here k is the number of rotations on a, and queries holds the list of indices to report. First we perform the two rotations. Now return the values from the zero-based indices 1 and 2 as indicated in the queries array.


circularArrayRotation has the following parameter(s):

    int a[n]: the array to rotate
    int k: the rotation count
    int queries[1]: the indices to report

Returns

    int[q]: the values in the rotated a as requested in m


Sample Input 0

a = [1, 2, 3]
K = 2
queries = [0,1,2]


Sample Output 0

2
3
1


*/
