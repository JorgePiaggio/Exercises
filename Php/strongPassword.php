<?php

/*
Its length is at least 6
It contains at least one digit.
It contains at least one lowercase English character.
It contains at least one uppercase English character.
It contains at least one special character. The special characters are: !@#$%^&*()-+ 
*/
function minimumNumber($n, $password) {

    $numbers = "0123456789";
    $lower_case = "abcdefghijklmnopqrstuvwxyz";
    $upper_case = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $special_characters = "!@#$%^&*()-+";
    $numbers = str_split($numbers);
    $lower_case = str_split($lower_case);
    $upper_case = str_split($upper_case);
    $special_characters = str_split($special_characters);   

    //flags
    $num = $low = $up = $spe = 1;
    
    $arr = str_split($password);
    
    foreach($arr as $char){                     // check special conditions
        if(in_array( $char, $numbers )){
            $num = 0;
        }
        else if(in_array( $char, $lower_case ) ){
            $low = 0;
        }
        else if(in_array( $char, $upper_case ) ){
            $up = 0;
        }
        else if(in_array( $char, $special_characters ) ){
            $spe = 0;
        }
    }    

    if( 6 - strlen($password) > ($num + $low + $up + $spe) )    // check min length
        return (6 - strlen($password));
    else
        return ($num + $low + $up + $spe);
}?>


/*


Louise joined a social networking site to stay in touch with her friends. The signup page required her to input a name and a password. However, the password must be strong. The website considers a password to be strong if it satisfies the following criteria:

    Its length is at least 6.
    It contains at least one digit.
    It contains at least one lowercase English character.
    It contains at least one uppercase English character.
    It contains at least one special character. The special characters are: !@#$%^&*()-+

She typed a random string of length n in the password field but wasn't sure if it was strong. Given the string she typed, can you find the minimum number of characters she must add to make her password strong?


minimumNumber has the following parameters:

    int n: the length of the password
    string password: the password to test


Returns

    int: the minimum number of characters to add


Sample Input 0

3
Ab1


Sample Output 0

3

*/
