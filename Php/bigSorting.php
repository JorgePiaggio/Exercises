<?php

function bigSorting($unsorted) {

    natsort($unsorted); 
    // Orders alphanumeric strings in the way a human being would while maintaining key/value associations. 
    // This is described as a "natural ordering".
   
    return $unsorted;
}
?>

/*

Consider an array of numeric strings where each string is a positive number with anywhere from to 1 to 10^6 digits. Sort the array's elements in non-decreasing, or ascending order of their integer values and return the sorted array.

Example

unsorted = ['1', '200', '150', '3']

Return the array ['1', '3', '150', '200'].


bigSorting has the following parameter(s):

    string unsorted[n]: an unsorted array of integers as strings


Returns

    string[n]: the array sorted in numerical order


Each string is guaranteed to represent a positive integer.
There will be no leading zeros.
The total number of digits across all strings in unsorted is between 1 and 10^6 (inclusive).


Sample Input 0

6
31415926535897932384626433832795
1
3
10
3
5


Sample Output 0

1
3
3
5
10
31415926535897932384626433832795


*/
