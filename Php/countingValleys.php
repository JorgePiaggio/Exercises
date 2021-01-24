<?php


function countingValleys($steps, $path) {
   
    $level = 0;
    $valleys = 0;
    $isThisAValley = false;
    $arr = str_split($path);
   
    for($i = 0; $i < $steps; $i++){
        if($arr[$i] == "U"){
            $level++;
        }else{
            $level--;
        }
        if(!$isThisAValley){
            if($level < 0){
                $isThisAValley = true;
                $valleys++;
            }
        }
        if($level >= 0){
            $isThisAValley = false;
        }
    }
    
    return $valleys;
}?>


/*

An avid hiker keeps meticulous records of their hikes. During the last hike that took exactly steps steps, for every step it was noted if it was an uphill, U, or a downhill, D step. Hikes always start and end at sea level, and each step up or down represents a 1 unit change in altitude. We define the following terms:

   - A mountain is a sequence of consecutive steps above sea level, starting with a step up from sea level and ending with a step down to sea level.
   - A valley is a sequence of consecutive steps below sea level, starting with a step down from sea level and ending with a step up to sea level.

Given the sequence of up and down steps during a hike, find and print the number of valleys walked through.



countingValleys has the following parameter(s):

    int steps: the number of steps on the hike
    string path: a string describing the path


Returns

    int: the number of valleys traversed


Sample Input

8
UDDDUDUU

Sample Output

1

*/

