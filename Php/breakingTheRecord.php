<?php

function breakingRecords($scores) {

    $min = $scores[0];
    $max = $scores[0];
    $newMins = 0;
    $newMaxs = 0;

    for($i = 1; $i < sizeof($scores); $i++){
        if($scores[$i] < $min){
            $min = $scores[$i];
            $newMins++;
        }
        else if($scores[$i] > $max){
            $max = $scores[$i];
            $newMaxs++;
        }
    }
    
    $result = [$newMaxs,$newMins];
    print_r($result);
    
    return $result;
}?>


/*

Maria plays college basketball and wants to go pro. Each season she maintains a record of her play. She tabulates the number of times she breaks her season record for most points and least points in a game. Points scored in the first game establish her record for the season, and she begins counting from there.

Scores are in the same order as the games played. She would tabulate her results as follows:

                                 Count
Game  Score  Minimum  Maximum   Min Max
 0      12     12       12       0   0
 1      24     12       24       0   1
 2      10     10       24       1   1
 3      24     10       24       1   1

Given the scores for a season, find and print the number of times Maria breaks her records for most and least points scored during the season.


breakingRecords has the following parameter(s):

    scores: an array of integers


Output Format

Print two space-seperated integers describing the respective numbers of times the best (highest) score increased and the worst (lowest) score decreased.

Sample Input 0

9
10 5 20 20 4 5 2 25 1

Sample Output 0

2 4

*/
