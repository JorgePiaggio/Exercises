<?php
function insertionSort1($n, $arr) {
    for($i = 0; $i < sizeof($arr); $i++){
        if($i > 0){
            if($arr[$i] < $arr[$i-1]){              // find number to sort
                $aux = $i ;  
                $num = $arr[$i];
                
                while($num < $arr[$aux-1]){
                    $arr[$aux] = $arr[$aux-1];      // order
                    $aux--;
                    
                    for($j = 0; $j < sizeof($arr); $j++){   // print steps
                        echo $arr[$j]." ";
                    } 
                    echo "\n";
                }              
              
                $arr[$aux] = $num;    
                            
                for($j = 0; $j < sizeof($arr); $j++){       // print sorted array
                        echo $arr[$j]." ";
                } 
            }
        }
    }
}
?>

/*

Sorting
One common task for computers is to sort data. For example, people might want to see all their files on a computer sorted by size. Since sorting is a simple problem with many different possible solutions, it is often used to introduce the study of algorithms.

Insertion Sort
These challenges will cover Insertion Sort, a simple and intuitive sorting algorithm. We will first start with a nearly sorted list.

Insert element into sorted list
Given a sorted list with an unsorted number e in the rightmost cell, can you write some simple code to insert e into the array so that it remains sorted?

Since this is a learning exercise, it won't be the most efficient way of performing the insertion. It will instead demonstrate the brute-force method in detail.

Assume you are given the array arr = [1,2,4,5,3] indexed 0...4. Store the value of arr[4]. Now test lower index values successively from 3 to 0 until you reach a value that is lower than arr[4], at arr[1] in this case. Each time your test fails, copy the value at the lower index to the current index and print your array. When the next lower indexed value is smaller than arr[4], insert the stored value at the current index and print the entire array.


insertionSort1 has the following parameter(s):

    n: an integer, the size of arr

    arr: an array of integers to sort

Returns

    None: Print the interim and final arrays, each on a new line. No return value is expected.

Sample Input

5
2 4 6 8 3

Sample Output

2 4 6 8 8 
2 4 6 6 8 
2 4 4 6 8 
2 3 4 6 8 


*/
