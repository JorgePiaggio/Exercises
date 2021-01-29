<?php

function gemstones($arr) {

    $test = $arr[0];
    $gemstones = 0;
    $letters = array();
    
    
    
    for($i = 0; $i < strlen($test); $i++){       // search each char from first string
        $found = 0;                               // in all other strings
        
        if( !in_array($test[$i], $letters )){
            for($j = 1; $j < sizeof($arr); $j++){           
                if( strpos($arr[$j], $test[$i]) > -1 ){
                    $found++;
                }
                if( $found == (sizeof($arr)-1) ){
                    $gemstones++;
                }
            }
        }
         
        $letters[$i] = $test[$i];               // mark letters already checked
    }

    return $gemstones;

}
?>


/*

There is a collection of rocks where each rock has various minerals embeded in it. Each type of mineral is designated by a lowercase letter in the range ascii[a - z]. There may be multiple occurrences of a mineral in a rock. A mineral is called a gemstone if it occurs at least once in each of the rocks in the collection.

Given a list of minerals embedded in each of the rocks, display the number of types of gemstones in the collection.


Example

arr= ['abc', 'abc', 'bc']

The minerals b and c appear in each rock, so there are 2 gemstones.


gemstones has the following parameter(s):

    string arr[n]: an array of strings

Returns

    int: the number of gemstones found


Sample Input

STDIN       Function
-----       --------
3           arr[] size n = 3
abcdde      arr = ['abcdde', 'baccd', 'eeabg']
baccd
eeabg

Sample Output

2

*/
