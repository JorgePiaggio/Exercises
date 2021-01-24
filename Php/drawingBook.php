<?php

function pageCount($n, $p) {
    
    $turns = 0;
    //last page, first page, second to last page -p being pair and n odd-
    if($n == $p || $p == 1 || ($n % 2 != 0 && $p % 2 == 0 && $p == $n - 1)){ 
        return 0;
    }
    
    if( $p <= floor($n/2) ){                    //if page is closer to the beginning
        $aux = 1;
        while($aux < $p){
            $aux+=2;
            $turns++;
        }
   }else{                                       //if page is closer to the end
        $aux = $n;
        if($aux % 2 != 0){		     //if book ends in odd number($n)
            $aux--;
        }
        while($aux > $p){
            $aux-=2;
            $turns++;
        }     
   }

    echo $turns;
    return $turns;
}?>


/*

A teacher asks the class to open their books to a page number. A student can either start turning pages from the front of the book or from the back of the book. They always turn pages one at a time. When they open the book, page 1 is always on the right side:

When they flip page 1, they see pages 2 and 3. Each page except the last page will always be printed on both sides. The last page may only be printed on the front, given the length of the book. If the book is n pages long, and a student wants to turn to page p, what is the minimum number of pages to turn? They can start at the beginning or the end of the book.

Given n and p, find and print the minimum number of pages that must be turned in order to arrive at page p.


pageCount has the following parameter(s):

    int n: the number of pages in the book
    int p: the page number to turn to

Returns

    int: the minimum number of pages to turn


Sample Input 0

6
2

Sample Output 0

1


*/
