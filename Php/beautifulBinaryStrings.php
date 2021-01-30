<?php

function beautifulBinaryString($b) {
    $arr = str_split($b); $changes = 0;
    
    for($i = 0; $i < sizeof($arr) - 2; $i++){
        if( $arr[$i] == 0 && $arr[$i+1] == 1 && $arr[$i+2] == 0 ){
            if($arr[$i+3]){
                if($arr[$i+3] == 0)
                    $arr[$i+1] = 0;
                else
                    $arr[$i+2] = 1;
            }else{
                $arr[$i+1] = 0;
            }
            $changes++;
        }
    }

    return $changes;
}
?>


/*

Alice has a binary string. She thinks a binary string is beautiful if and only if it doesn't contain the substring '010'.

In one step, Alice can change a 0 to a 1 or vice versa. Count and print the minimum number of steps needed to make Alice see the string as beautiful.

For example, if Alice's string is b = '010' she can change any one element and have a beautiful string.


beautifulBinaryString has the following parameter(s):

    b: a string of binary digits
    

Output Format

Print the minimum number of steps needed to make the string beautiful.


Sample Input 0
7
0101010

Sample Output 0
2  


Sample Input 1
5
01100

Sample Output 1
0

*/
