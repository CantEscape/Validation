<?php

class Phone
{
    public function check($args)
    {
        if (preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $args)) {
            return true;
        }
        
        return false;
    }
}