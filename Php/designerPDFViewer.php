<?php

function designerPdfViewer($h, $word) {

    $alphabet = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
    
    $tallest = 0;
    $wordArr = str_split($word);
    
    for($i = 0; $i < sizeof($wordArr); $i++){
        $j = 0;
        while($wordArr[$i] != $alphabet[$j]){
            $j++;
        }
        if($h[$j] > $tallest){
            $tallest = $h[$j];
        }
    }
    
    
    return $tallest * sizeof($wordArr);
    
}
?>


/*

When a contiguous block of text is selected in a PDF viewer, the selection is highlighted with a blue rectangle. In this PDF viewer, each word is highlighted independently.

There is a list of 26 character heights aligned by index to their letters. For example, 'a' is at index 0 and 'z' is at index 25. There will also be a string. Using the letter heights given, determine the area of the rectangle highlight in mm^2 assuming all letters are 1mm wide.

Example

1 3 1 3 1 4 1 3 2 5 5 5 5 5 5 5 5 5 5 5 5 5 5 5 5 5
abc

The heights are and 1, 3, 1. The tallest letter is 3 high and there are 3 letters. The hightlighted area will be 3 * 3 so the answer is 9.


designerPdfViewer has the following parameter(s):

    int h[26]: the heights of each letter
    string word: a string


Returns

    int: the size of the highlighted area


Sample Input 0

1 3 1 3 1 4 1 3 2 5 5 5 5 5 5 5 5 5 5 5 5 5 5 5 5 5
abc

Sample Output 0

9

*/
