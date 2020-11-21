<?php

namespace App;

class FizzBuzz 
{
    /* public function forNumber($number)
    {
        if ($number % 3 === 0 && $number % 5 === 0) {
            return "FizzBuzz";
        }
        if ($number % 3 === 0) {
            return "Fizz";
        }
        if ($number % 5 === 0) {
            return "Buzz";
        }
        
        return "$number";
    } */

    // pass parameter $number into forNumber method
     
    /* public function forNumber($number)
    {
        //declare $output variable for $number 
                        //that if a multiple of 3  
                                    //if true return "Fizz" if false return empty string.
        $output = $number % 3 === 0 ? "Fizz" : ""; 
    
                //concatenate $output
                        //that if a multiple of 5  
                                    //if true return "Buzz" if false return empty string.
        $output .= $number % 5 === 0 ? "Buzz" : "";

        $output .= $number % 7 === 0 ? "Rarr" : "";
        
                //if output is equal to empty string(true)
                            // return $number
                                        //else(false) return $output
        return $output === "" ? "$number" : $output;
    } 
 */
    public function forNumber(int $number) : string
    {
        //decalre variable for empty string
        $output = "";
        
        //declare $output variable for $number 
                        //that if a multiple of 3  
                                    //if true return "Fizz" if false return empty string.
        $output .= $number % 3 === 0 ? "Fizz" : ""; 
    
                //concatenate $output
                        //that if a multiple of 5  
                                    //if true return "Buzz" if false return empty string.
        $output .= $number % 5 === 0 ? "Buzz" : "";

        $output .= $number % 7 === 0 ? "Rarr" : "";
        
                //if output is equal to empty string(true)
                            // return $number(convert to string)
                                        //else(false) return $output
        return $output === "" ? strval($number) : $output;
    } 

}