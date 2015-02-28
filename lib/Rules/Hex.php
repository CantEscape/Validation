<?php

class Hex
{
    public function check($args)
    {
        if (ctype_xdigit($args)) {
            return true;
        }
        
        return false;
    }
}