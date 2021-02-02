<?php
/*
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER_ARRAY a
 *  2. INTEGER_ARRAY b
*/

function getTotalX($a, $b) {
    $between = 0;
    for($i = $a[sizeof($a)-1]; $i <= $b[0]; $i++){
        $add = true;
        foreach($a as $div1){
            if($i % $div1 != 0){
                $add = false;
                break;
            }
        }
        if($add){
            foreach($b as $div2){
                if($div2 % $i != 0){
                    $add = false;
                    break;
                }
            }
        }
        if($add) $between++;
    }
    return $between;
}
?>

/*

There will be two arrays of integers. Determine all integers that satisfy the following two conditions:

    - The elements of the first array are all factors of the integer being considered
    - The integer being considered is a factor of all elements of the second array

These numbers are referred to as being between the two arrays. Determine how many such numbers exist.

Example

a = [2,6]
b = [24,36]

There are two numbers between the arrays: 6 and 12.
6%2 == 0, 6%6 == 0, 24%6 == 0 and 36%6 == 0 for the first value.
12%2 == 0, 12%6 == 0, 24%12 == 0 and 36%12 == 0 for the second value. Return 2.


getTotalX has the following parameter(s):

    int a[n]: an array of integers
    int b[m]: an array of integers

Returns

    int: the number of integers that are between the sets 

Input Format

The first line contains two space-separated integers, n and m, the number of elements in arrays a and b.
The second line contains n distinct space-separated integers a[i] where 0 <= i < n.
The third line contains m distinct space-separated integers b[j] where 0 <= j < m.



Sample Input
2 3
2 4
16 32 96

Sample Output
3

Explanation

2 and 4 divide evenly into 4, 8, 12 and 16.
4, 8 and 16 divide evenly into 16, 32, 96.

4, 8 and 16 are the only three numbers for which each element of a is a factor and each is a factor of all elements of b. 


*/
