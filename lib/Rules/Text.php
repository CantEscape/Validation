<?php

class Text
{
    public function check($args)
    {
        //Remove spaces
        $args = str_replace(" ", "", $args);
        
        if (ctype_alpha($args)) {
            return true;
        }
        
        return false;
    }
}