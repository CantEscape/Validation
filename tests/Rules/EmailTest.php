<?php
use CantEscape\Validator;

class EmailTest extends \PHPUnit_Framework_TestCase
{
    include "../../lib/Validator.php";
    
    public function testEmail()
    {
        $v = new Validator();
        $this->assertEquals(true, $v->email("james@me.com")->is());
    }
}