<?php

// s == string, $k == rotation
function caesarCipher($s, $k) {

    $alp = 'abcdefghijklmnopqrstuvwxyz';
    $alp2 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $alphabet = str_split($alp);
    $alphabet2 = str_split($alp2);
    $rotated = $alphabet;
    $rotated2 = $alphabet2;

    for($i = 0; $i < $k; $i++){			// rotate lower && upper alphabets
        $aux = array_shift($rotated);
        array_push($rotated, $aux);
        $aux2 = array_shift($rotated2);
        array_push($rotated2, $aux2);
    }
    //print_r($rotated);
    
    $caesar = array();
    
    for($i = 0; $i < strlen($s); $i++){		// if symbol, print
        if(!in_array($s[$i], $alphabet) && !in_array($s[$i], $alphabet2) ){
            array_push($caesar, $s[$i]);
        }else{
            if(in_array($s[$i], $alphabet))	// else check if lower or upper
                array_push($caesar, $rotated[array_search($s[$i], $alphabet)]);
            else
                array_push($caesar, $rotated2[array_search($s[$i], $alphabet2)]);

        }
    }
    
    return (implode("", $caesar));
}?>

/*

Julius Caesar protected his confidential information by encrypting it using a cipher. Caesar's cipher shifts each letter by a number of letters. If the shift takes you past the end of the alphabet, just rotate back to the front of the alphabet. In the case of a rotation by 3, w, x, y and z would map to z, a, b and c.

Original alphabet:      abcdefghijklmnopqrstuvwxyz
Alphabet rotated +3:    defghijklmnopqrstuvwxyzabc


Note: The cipher only encrypts letters; symbols, such as -, remain unencrypted.


caesarCipher has the following parameter(s):

    string s: cleartext
    int k: the alphabet rotation factor


Returns

    string: the encrypted string


Sample Input

11
middle-Outz
2

Sample Output

okffng-Qwvb


*/







