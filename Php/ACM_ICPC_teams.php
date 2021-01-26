<?php

function acmTeam($topic) {

    $maxSubjects = 0;
    $teams = 0;
    $winnerString = '';
    
    for($i = 0; $i < sizeof($topic); $i++){			
        for($j = $i+1; $j < sizeof($topic); $j++){	// compare each str with the rest
            $auxSubjects = 0;
            $str = str_split($topic[$i]);        
            $str2 = str_split($topic[$j]);
            //echo " [".$i. "-". $j."] ";
            
            for($k = 0; $k < sizeof($str); $k++){		// count ones
                if($str2[$k] == 1){
                    $auxSubjects++;
                }else if($str[$k] == 1){
                    $auxSubjects++;
                }
            }
            //print_r($str);
            	
            if($auxSubjects > $maxSubjects){		// check if is highscore
                $maxSubjects = $auxSubjects;
                $teams = 0; 
            }
            if($auxSubjects == $maxSubjects){		// check if highscore repeats
                $teams++;// echo $winnerString;
            }
        }
    }
    
    return [$maxSubjects, $teams];
}?>


/*

There are a number of people who will be attending ACM-ICPC World Finals. Each of them may be well versed in a number of topics. Given a list of topics known by each attendee, presented as binary strings, determine the maximum number of topics a 2-person team can know. Each subject has a column in the binary string, and a '1' means the subject is known while '0' means it is not. Also determine the number of teams that know the maximum number of topics. Return an integer array with two elements. The first is the maximum number of topics known, and the second is the number of teams that know that number of topics.

Example

n = 3
topics = ['10101', '11110', '00010']

The attendee data is aligned for clarity below:

10101
11110
00010

These are all possible teams that can be formed:

Members Subjects
(1,2)   [1,2,3,4,5]
(1,3)   [1,3,4,5]
(2,3)   [1,2,3,4]

In this case, the first team will know all 5 subjects. They are the only team that can be created that knows that many subjects, so [5, 1] is returned.


Returns

    int[2]: the maximum topics and the number of teams that know that many topics


Sample Input

4 5
10101
11100
11010
00101

Sample Output

5
2

*/
