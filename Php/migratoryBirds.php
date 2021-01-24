<?php

function migratoryBirds($arr) {
    $birds = array();
    
   
    // create empty array
    $a = 0;
    while($a <= 5){
        $birds[$a]=0;
        $a++;
    }
    
    //count number of sights for each bird, store in array. key == bird number
    for($i = 0; $i < sizeof($arr); $i++){
        $birds[$arr[$i]]+=1;
    }
    
    //print_r($birds);
    
    // search array in reverse for bird most sighted
    $sights = $birds[sizeof($birds)-1];
    $position = (sizeof($birds)-1);
    
    for($j = sizeof($birds)-1; $j >= 0; $j--){
        if($birds[$j] >= $sights){
            $sights = $birds[$j];
            $position = $j;
        }
    }
    
    return $position;
}?>



/*

Given an array of bird sightings where every element represents a bird type id, determine the id of the most frequently sighted type. If more than 1 type has been spotted that maximum amount, return the smallest of their ids.


migratoryBirds has the following parameter(s):

    int arr[n]: the types of birds sighted

Returns

    int: the lowest type id of the most frequently sighted birds

Constraints

It is guaranteed that each type is 1, 2, 3, 4, or 5.


Sample Input 0

6
1 4 4 4 5 3

Sample Output 0

4

*/
