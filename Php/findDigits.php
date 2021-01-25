<?php

function findDigits($n) {
    
    $divisors = 0;
    $arr = str_split($n);			// int to array
    
    for($i = 0; $i < sizeof($arr); $i++){		// divide n for each n digit	
        if($arr[$i] != 0){
            if($n % $arr[$i] == 0){
                $divisors++;
            }
        }
    }

    return $divisors;
}?>


/*

An integer d is a divisor of an integer n if the remainder of n/d = 0.
Given an integer, for each digit that makes up the integer determine whether it is a divisor. Count the number of divisors occurring within the integer.


Example
n = 124
Check whether 1, 2 and 4 are divisors of 124. All 3 numbers divide evenly into so return 3.


findDigits has the following parameter(s):

    int n: the value to analyze


Returns

    int: the number of digits in n that are divisors of n.


Sample Input


12
1012

Sample Output

2
3

*/
