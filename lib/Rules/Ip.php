<?php

class Ip
{
    public function check($args)
    {
        if (filter_var($args, FILTER_VALIDATE_IP)) {
            return true;
        }
        return false;
    }
}