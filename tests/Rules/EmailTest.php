<?php
use CantEscape\Validator;

include "../../lib/Validator.php";

class EmailTest extends \PHPUnit_Framework_TestCase
{
    public function testEmail()
    {
        $v = new Validator();
        $this->assertEquals(true, $v->email("james@me.com")->is());
    }
}