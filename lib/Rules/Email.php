<?php

class Email
{
    public function check($args)
    {
        if (filter_var($args, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
}