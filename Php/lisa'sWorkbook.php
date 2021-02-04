<?php
/*
n: an integer that denotes the number of chapters
k: an integer that denotes the maximum number of problems per page
arr: an array of integers that denote the number of problems in each chapter
*/
function workbook($n, $k, $arr) {
    $chapter = $page = 1;
    $specials = $i = 0;
    
    while($chapter <= $n){
        $problem = 0;
        
        while($arr[$i] > 0){                            // $k problems into pages
            $arr[$i]--; $problem++;
            
            if($problem == $page){                      // special
                $specials++;       
            }
            if($problem % $k == 0 || $arr[$i] == 0){     // change page
                $page++; 
            }
        }
        $chapter++; $i++; 
    }
    return $specials;
}

?>

/*

Lisa just got a new math workbook. A workbook contains exercise problems, grouped into chapters. Lisa believes a problem to be special if its index (within a chapter) is the same as the page number where it's located. The format of Lisa's book is as follows:

   	There are n chapters in Lisa's workbook, numbered from 1 to n.
   	The ith chapter has arr[i] problems, numbered from 1 to arr[i].
	Each page can hold up to k problems. Only a chapter's last page of exercises may contain fewer than k problems.
	Each new chapter starts on a new page, so a page will never contain problems from more than one chapter.
	The page number indexing starts at 1.

Given the details for Lisa's workbook, can you count its number of special problems?



workbook has the following parameter(s):

    n: an integer that denotes the number of chapters
    k: an integer that denotes the maximum number of problems per page
    arr: an array of integers that denote the number of problems in each chapter


Output Format

Print the number of special problems in Lisa's workbook.

Sample Input

n = 5 
k = 3  
arr = 4 2 6 1 10

Sample Output
4




*/
