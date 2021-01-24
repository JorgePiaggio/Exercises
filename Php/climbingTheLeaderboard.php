<?php

function climbingLeaderboard($ranked, $player) {
        
    $rankHist = array();
    $position = 1;
    $i = 0;
    $j = 0;
    
    
    // player ranks comes in asc order, reverse player array //
    $playerRanks = array();
    for($e = 0; $e < sizeof($player); $e++){
        array_push($playerRanks, $player[sizeof($player)-1 - $e]);
    }

    // find player positions
    while($i < sizeof($playerRanks)){
        if($playerRanks[$i] >= $ranked[$j]){
            array_push($rankHist, $position);
            $i++;
        }else{
            $j++;
            if($ranked[$j] != $ranked[$j-1]){
                $position++;
            }
        }
               
    }
    
    // reverse player positions array for desc output//
    $rankHist2 = array();
    for($e = 0; $e < sizeof($rankHist); $e++){
        array_push($rankHist2, $rankHist[sizeof($rankHist)-1 - $e]);
    }
    
    return $rankHist2;
}?>

/*
An arcade game player wants to climb to the top of the leaderboard and track their ranking. The game uses Dense Ranking, so its leaderboard works like this:

    - The player with the highest score is ranked number 1 on the leaderboard.
    - Players who have equal scores receive the same ranking number, and the next player(s) receive the immediately following ranking number.


Example

ranked = [100,90,90,80]
player = [70, 80, 105]

The ranked players will have ranks 1, 2, 2 and 3, respectively. If the player's scores are 70, 80 and 105, their rankings after each game are 4th, 3rd and 1st. Return [4, 3, 1].


climbingLeaderboard has the following parameter(s):

    int ranked[n]: the leaderboard scores
    int player[m]: the player's scores


Returns

    int[m]: the player's rank after each new score


Sample Input 

Array: ranked

100 100 50 40 40 20 10

Array: player

5 25 50 120


Sample Output 

6
4
2
1

*/
