<?php
                        
function birthday($s, $d, $m) {
    
    $match = 0;
    
    for($i = 0; $i <= sizeof($s) - $m; $i++){
        $count = 1;
        $sum = $s[$i];
        
        while($count < $m){
            $sum+=$s[$i+$count];
            $count++;
        }
        if($sum == $d){
            $match++;
        }
     
    }
    
    echo $match;
    return $match;
}?>


/*

Given a chocolate bar, two children, Lily and Ron, are determining how to share it. Each of the squares has an integer on it.

Lily decides to share a contiguous segment of the bar selected such that:

    The length of the segment matches Ron's birth month, and,
    The sum of the integers on the squares is equal to his birth day.

You must determine how many ways she can divide the chocolate.


birthday has the following parameter(s):

    s: an array of integers, the numbers on each of the squares of chocolate
    d: an integer, Ron's birth day
    m: an integer, Ron's birth month


Output Format

Print an integer denoting the total number of ways that Lily can portion her chocolate bar to share with Ron.

Sample Input 0

5
1 2 1 3 2
3 2

Sample Output 0

2


*/


