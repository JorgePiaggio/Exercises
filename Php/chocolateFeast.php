<?php
/*
int n: Bobby's initial amount of money
int c: the cost of a chocolate bar
int m: the number of wrappers he can turn in for a free bar
*/
function chocolateFeast($n, $c, $m) {
    $choco = $wrap = 0;
    
    $choco = floor($n / $c);  //  total cash / price
    $wrap = $choco;             // total wraps
    
    // add new wraps while promo
    while($wrap >= $m){
        $free = floor($wrap/$m); // wraps changed for new chocos
        $choco += $free;   // chocos add
        $wrap -= $free * $m ;   // wraps used
        $wrap += $free;         // wraps remain + wraps of free chocos
    }
    
    return $choco;
}?>



/*

Little Bobby loves chocolate. He frequently goes to his favorite 5 & 10
store, Penny Auntie, to buy them. They are having a promotion at Penny Auntie. If Bobby saves enough wrappers, he can turn them in for a free chocolate.

Example

n = 15
c = 3
m = 2

He has 15 to spend, bars cost 3, and he can turn 2 in wrappers to receive another bar. Initially, he buys 5 bars and has 5 wrappers after eating them. He turns in 4 of them, leaving him with 1, for more bars. After eating those two, he has 3 wrappers, turns in 2 leaving him with 1 wrapper and his new bar. Once he eats that one, he has 2 wrappers and turns them in for another bar. After eating that one, he only has 1 wrapper, and his feast ends. Overall, he has eaten 5 + 2 + 1 + 1 = 9 bars.


chocolateFeast has the following parameter(s):

    int n: Bobby's initial amount of money
    int c: the cost of a chocolate bar
    int m: the number of wrappers he can turn in for a free bar

Returns

    int: the number of chocolates Bobby can eat after taking full advantage of the promotion

Note: Little Bobby will always turn in his wrappers if he has enough to get a free chocolate.


Sample Input

STDIN   Function
-----   --------
3       t = 3 (test cases)
10 2 5  n = 10, c = 2, m = 5 (first test case)
12 4 4  n = 12, c = 4, m = 4 (second test case)
6 2 2   n = 6,  c = 2, m = 2 (third test case)

Sample Output

6
3
5


*/
