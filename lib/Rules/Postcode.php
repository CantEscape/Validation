<?php

class Postcode
{
    public function check($args)
    {
        $args = strtoupper($args);
        
        if (preg_match('#^(GIR ?0AA|[A-PR-UWYZ]([0-9]{1,2}|([A-HK-Y][0-9]([0-9ABEHMNPRV-Y])?)|[0-9][A-HJKPS-UW]) ?[0-9][ABD-HJLNP-UW-Z]{2})$#', $args)) {
            return true;
        }
        
        return false;
    }
}