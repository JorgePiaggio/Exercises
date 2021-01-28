<?php

//  $G == grid   |   $P == pattern
function gridSearch($G, $P) {
    
    for($i = 0; $i < sizeof($G); $i++){     
        $j = 0;
        while( $j <= (strlen($G[$i]) - strlen($P[0])) ){        // search first pattern in each grid line
            if( substr($G[$i], $j, strlen($P[0])) == $P[0] ){   // if first pattern line exists
                $k = 1;
                while($k < sizeof($P)){
                    if( substr($G[$i+$k], $j, strlen($P[0])) == $P[$k] ){   // check below lines match
                    $k++;
                    }else{
                        break;
                    }
                }
                
                if($k == sizeof($P)){
                    return "YES";
                }
            }
            $j++; 
        }
    }
    
    return "NO";
}
?>


/*

Given an array of strings of digits, try to find the occurrence of a given pattern of digits. In the grid and pattern arrays, each string represents a row in the grid. For example, consider the following grid:

1234567890  
0987654321  
1111111111  
1111111111  
2222222222  

The pattern array is:

876543  
111111  
111111

The pattern begins at the second row and the third column of the grid and continues in the following two rows. The pattern is said to be present in the grid. The return value should be YES or NO, depending on whether the pattern is found. In this case, return YES.


Function Description

Complete the gridSearch function in the editor below. It should return YES if the pattern exists in the grid, or NO otherwise.


gridSearch has the following parameter(s):

    string G[R]: the grid to search
    string P[r]: the pattern to search for


Returns

    string: either YES or NO


Sample Input

GRID

7283455864
6731158619
8988242643
3830589324
2229505813
5633845374
6473530293
7053106601
0834282956
4607924137

PATTERN

9505
3845
3530

GRID

400453592126560
114213133098692
474386082879648
522356951189169
887109450487496
252802633388782
502771484966748
075975207693780
511799789562806
404007454272504
549043809916080
962410809534811
445893523733475
768705303214174
650629270887160

PATTERN

99
99

Sample Output

YES
NO


*/
