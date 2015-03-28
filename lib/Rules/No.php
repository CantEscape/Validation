<?php

class No
{
    public function check($args)
    {
        $possibleOptions = array(
            "no", "nope", "0", "false"
            );
        
        return (in_array(strtolower($args), $possibleOptions)) ? true : false;
    }
}