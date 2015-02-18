<?php
use CantEscape\Validator;

class EmailTest extends PHPUnit_Framework_TestCase
{
    public function testEmail()
    {
        $v = new Validator();
        $this->assertEquals(true, $v->email("james@me.com")->is());
    }
}