<?php

function angryProfessor($k, $a) {

    $studs = 0;
    
    for($i = 0; $i < sizeof($a); $i++){
        if($a[$i] <= 0){
            $studs++;
        }
    }
            
        // no == class not cancelled
    return $studs >= $k ? "NO" : "YES";
}
?>

/*

A Discrete Mathematics professor has a class of students. Frustrated with their lack of discipline, the professor decides to cancel class if fewer than some number of students are present when class starts. 

Given the arrival time of each student and a threshhold number of attendees, determine if the class is cancelled.


Example

n = 5
k = 3
a = [-2, -1, 0, 1, 2]

The first 3 students arrived on. The last 2 were late. The threshold is 3 students, so class will go on. Return YES.

Note: Non-positive arrival times indicate the student arrived early or on time; positive arrival times indicate the student arrived a[i] minutes late.


angryProfessor has the following parameter(s):

    int k: the threshold number of students
    int a[n]: the arrival times of the n students


Returns

    string: either YES or NO


Sample Input

2
4 3
-1 -3 4 2
4 2
0 -1 2 1

Sample Output

YES
NO

*/
