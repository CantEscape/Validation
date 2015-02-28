<?php

class PureText
{
    public function check($args)
    {
        if (ctype_alpha($args)) {
            return true;
        }
        
        return false;
    }
}