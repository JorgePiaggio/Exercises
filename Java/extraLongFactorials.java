import java.io.*;
import java.math.*;
import java.security.*;
import java.text.*;
import java.util.*;
import java.util.concurrent.*;
import java.util.regex.*;
import java.math.BigInteger; 

public class Solution {

    static void extraLongFactorials(int n) {
    
    BigInteger f = BigInteger.valueOf(1);
    
    while(n > 1){
        f = f.multiply(BigInteger.valueOf(n));
        n--;
    }
    
    System.out.println(f);
    
    }

    private static final Scanner scanner = new Scanner(System.in);

    public static void main(String[] args) {
        int n = scanner.nextInt();
        scanner.skip("(\r\n|[\n\r\u2028\u2029\u0085])?");

        extraLongFactorials(n);

        scanner.close();
    }
}


/*

Calculate and print the factorial of a given integer.

For example, if n = 30, we calculate and get 30 x 29 x 28 x ... x 2 x 1 and get 265252859812191058636308480000000.


Function Description

Complete the extraLongFactorials function in the editor below. It should print the result and return.


extraLongFactorials has the following parameter(s):

    n: an integer

Note: Factorials of n > 20 can't be stored even in a 64-bit long long variable. Big integers must be used for such calculations. Languages like Java, Python, Ruby etc. can handle big integers, but we need to write additional code in C/C++ to handle huge values.

We recommend solving this challenge using BigIntegers.


Input Format

Input consists of a single integer n


Output Format

Print the factorial of n



Sample Input

7

Sample Output

5040
*/
