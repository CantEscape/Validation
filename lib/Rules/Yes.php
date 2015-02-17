<?php

class Yes
{
    public function check($args)
    {
        $possibleOptions = array(
            "yes", "1", "ok", "correct", "true"
            );
        
        return (in_array(strtolower($args), $possibleOptions)) ? true : false;
    }
}