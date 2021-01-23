<?php

function gradingStudents($grades) {
    
    for($i = 0 ; $i < sizeof($grades); $i++){
        if($grades[$i] >= 38){
            if($grades[$i] % 5 != 0){
                if(($grades[$i]+1) % 5 == 0){
                    $grades[$i]+=1;
                }else if(($grades[$i]+2) % 5 == 0){
                    $grades[$i]+=2;
                }
            }
        }
    }
    
    return $grades;
}?>


/*

HackerLand University has the following grading policy:

    Every student receives a grade in the inclusive range from 0 to 100.
    
Any grade less than 40 is a failing grade.

Sam is a professor at the university and likes to round each student's grade according to these rules:

    	If the difference between the grade and the next multiple of 5 is less than 3, round up to the next multiple of 5.
	If the value of grade is less than 38, no rounding occurs as the result will still be a failing grade.


gradingStudents has the following parameter(s):

    int grades[n]: the grades before rounding

Returns

    int[n]: the grades after rounding as appropriate


Sample Input 0

4
73
67
38
33

Sample Output 0

75
67
40
33

*/
