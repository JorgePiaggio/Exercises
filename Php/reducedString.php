<?php

function superReducedString($s) {
    
    $strArray = str_split($s);                      // str to array
    $strFiltered;
    $pairs = 0;
    while($pairs == 0){
        for($i = 0; $i < sizeof($strArray)-1; $i++){
            $j = $i+1;                              // replace adj pairs with " "
            if($strArray[$i] == $strArray[$j]){
                $strArray[$i] = " ";
                $strArray[$j] = " ";
                $pairs++;
            }
        }
        
    $str = implode("", $strArray);                  //  array to str
    $strFiltered = str_replace(" ", "", $str);      // take out empty spaces from string
    if($pairs == 0){
        return $strFiltered == "" ? "Empty String" : $strFiltered;
    }
    $strArray = str_split($strFiltered);            // new str to array
    $pairs = 0;
    }
  
    
}?>


/*

Reduce a string of lowercase characters in range ascii[‘a’..’z’] by doing a series of operations. In each operation, select a pair of adjacent letters that match, and delete them.

Delete as many characters as possible using this method and return the resulting string. If the final string is empty, return Empty String


Example.

s = 'aab'

aab shortens to b in one operation: remove the adjacent a characters.

s = 'abba'

Remove the two 'b' characters leaving 'aa'. Remove the two 'a' characters to leave ''. Return 'Empty String'.


superReducedString has the following parameter(s):

    string s: a string to reduce


Returns

    string: the reduced string or Empty String


Sample Input 0

aaabccddd

Sample Output 0

abd

*/
