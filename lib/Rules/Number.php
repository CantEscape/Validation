<?php

class Number
{
    public function check($args)
    {
        //Remove decimals
        $args = str_replace(".", "", $args);
        
        //Remove negative
        if (substr($args, 0, 1) == "-") {
            $args = substr($args, 1);
        }
        
        if (ctype_digit($args)) {
            return true;
        }
        
        return false;
    }
}