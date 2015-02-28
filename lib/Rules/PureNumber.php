<?php

class PureNumber
{
    public function check($args)
    {
        if (ctype_digit($args)) {
            return true;
        }
        
        return false;
    }
}