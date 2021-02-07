<?php
function gamingArray($arr) {

    $moves = 0;
    while(sizeof($arr) > 0){
        $max = max($arr);
        $i = array_search($max, $arr);
        array_splice($arr, $i);
        //print_r($arr);
        $moves++;
    }

    return $moves % 2 == 0 ? "ANDY" : "BOB";
}

/*
function gamingArray($arr) {

    $moves = 0;
    while(sizeof($arr) > 0){
        $max = max($arr);
        while($arr[sizeof($arr)-1] != $max){
            array_pop($arr);
        }
        array_pop($arr);
        $moves++;
    }

    return $moves % 2 == 0 ? "ANDY" : "BOB";
}*/

?>

/*

Andy wants to play a game with his little brother, Bob. The game starts with an array of distinct integers and the rules are as follows:

    - Bob always plays first.
    - In a single move, a player chooses the maximum element in the array. He removes it and all elements to its right. For example, if the starting array arr = [2,3,5,4,1], then it becomes arr'=[2,3] after removing [5,4,1].
    - The two players alternate turns.
    - The last player who can make a move wins.

Andy and Bob play g games. Given the initial array for each game, find and print the name of the winner on a new line. If Andy wins, print ANDY; if Bob wins, print BOB.

To continue the example above, in the next move Andy will remove 3. Bob will then remove 2 and win because there are no more integers to remove.


gamingArray has the following parameter(s):

    int arr[n]: an array of integers

Returns
- string: either ANDY or BOB


Sample Input 0

2
5
5 2 6 3 4
2
3 1

Sample Output 0

ANDY
BOB

*/
