<?php

class Visa
{
    public function check($args)
    {
        //Remove whitespaces and -
        $args = preg_replace('/\D/', '', $args);
        
        //Check the card matches the Visa pattern
        if (substr($args, 0, 1) == "4") {
            return $this->luhn_check($args);
        }
        
        return false;
    }
    
    /* Luhn algorithm number checker - (c) 2005-2008 shaman - www.planzero.org *
    * This code has been released into the public domain, however please      *
    * give credit to the original author where possible.                      */
    private function luhn_check($number)
    {
        // Set the string length and parity
        $number_length=strlen($number);
        $parity=$number_length % 2;
        
        // Loop through each digit and do the maths
        $total=0;
        for ($i=0; $i<$number_length; $i++) {
            $digit=$number[$i];
            // Multiply alternate digits by two
            if ($i % 2 == $parity) {
                $digit*=2;
                // If the sum is two digits, add them together (in effect)
                if ($digit > 9) {
                    $digit-=9;
                }
            }
            // Total up the digits
            $total+=$digit;
        }

        // If the total mod 10 equals 0, the number is valid
        return ($total % 10 == 0) ? TRUE : FALSE;
    }
}