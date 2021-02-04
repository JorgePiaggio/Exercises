<?php
// https://en.wikipedia.org/wiki/Parity_of_a_permutation

function larrysArray($A) {

    $inversions = 0;
    
    for($i = 0; $i < sizeof($A)-1; $i++){
        for($j = $i+1; $j < sizeof($A); $j++){
            if($A[$i] > $A[$j]){
                $inversions++;
            }
        }
    }
    return $inversions % 2 == 0 ? "YES" : "NO";
}
?>


/*

Larry has been given a permutation of a sequence of natural numbers incrementing from 1 as an array. He must determine whether the array can be sorted using the following operation any number of times:

    Choose any 3 consecutive indices and rotate their elements in such a way that
	ABC -> BCA -> CAB -> ABC

For example, if A = [1, 6, 5, 2, 4, 3]:

A		rotate 
[1,6,5,2,4,3]	[6,5,2]
[1,5,2,6,4,3]	[5,2,6]
[1,2,6,5,4,3]	[5,4,3]
[1,2,6,3,5,4]	[6,3,5]
[1,2,3,5,6,4]	[5,6,4]
[1,2,3,4,5,6]

YES

On a new line for each test case, print YES if A can be fully sorted. Otherwise, print NO.


larrysArray has the following parameter(s):

    A: an array of integers


Output Format

For each test case, print YES if A can be fully sorted. Otherwise, print NO.

Sample Input


3
3 1 2
4
1 3 4 2
5
1 2 3 5 4

Sample Output

YES
YES
NO

*/
