<?php

include "vendor/autoload.php";

use CantEscape\Validator;

//Create new Validator
$v = new Validator();

var_dump(array(
    $v->email("bla@bla.com")->email("one@two@.net", "james@me.com")->debrief()
));