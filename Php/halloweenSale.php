<?php

/*
    int p: the price of the first game
    int d: the discount from the previous game price
    int m: the minimum cost of a game
    int s: the starting budget
    */
function howManyGames($p, $d, $m, $s) {

    $total = 0;
    $games = 0;
    
    while(true){
        $total += $p;
        $p-=$d;
        if($p < $m){
            $p = $m;
        }
        if($total > $s){
            return $games;
        }
        $games++;
    }
}
?>


/*

You wish to buy video games from the famous online video game store Mist.

Usually, all games are sold at the same price, p dollars. However, they are planning to have the seasonal Halloween Sale next month in which you can buy games at a cheaper price. Specifically, the first game will cost p dollars, and every subsequent game will cost d dollars less than the previous one. This continues until the cost becomes less than or equal to m dollars, after which every game will cost m dollars. How many games can you buy during the Halloween Sale?


howManyGames has the following parameters:

    int p: the price of the first game
    int d: the discount from the previous game price
    int m: the minimum cost of a game
    int s: the starting budget


Sample Input 0

20 3 6 80

Sample Output 0

6



*/
