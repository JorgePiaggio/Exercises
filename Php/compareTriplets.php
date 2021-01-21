<?php


function compareTriplets($a, $b) {

    $results= [0, 0];
    
    for($i = 0 ; $i <3; $i++){
        if($a[$i] > $b[$i]){
            $results[0]+=1;
        }else if($a[$i] < $b[$i]){
            $results[1]+=1;
        }
    }
    return $results;
}


?>

/*

compareTriplets has the following parameter(s):

    int a[3]: Alice's challenge rating
    int b[3]: Bob's challenge rating

Return

    int[2]: Alice's score is in the first position, and Bob's score is in the second.

Input Format

The first line contains 3 space-separated integers, a[0], a[1], and a[2], the respective values in triplet a.
The second line contains 3 space-separated integers, b[0], b[1], and b[2], the respective values in triplet b.

Constraints

    1 ≤ a[i] ≤ 100
    1 ≤ b[i] ≤ 100
*/

