<?php

function bonAppetit($bill, $k, $b) {
    
    $total = 0;    
    $diff = 0;
    
    for($i = 0; $i < sizeof($bill); $i++){
        $total+=$bill[$i];
    }
    $total -= $bill[$k];
    
    $diff = $b - ($total/2);
    
    if($diff == 0){
        echo "Bon Appetit";
    }else{
        echo $diff;
    }

}?>


/*

Two friends Anna and Brian, are deciding how to split the bill at a dinner. Each will only pay for the items they consume. Brian gets the check and calculates Anna's portion. You must determine if his calculation is correct.


bonAppetit has the following parameter(s):

    bill: an array of integers representing the cost of each item ordered
    k: an integer representing the zero-based index of the item Anna doesn't eat
    b: the amount of money that Anna contributed to the bill


Output Format

If Brian did not overcharge Anna, print Bon Appetit on a new line; otherwise, print the difference


Sample Input 0

4 1
3 10 2 9
12

Sample Output 0

5

*/
