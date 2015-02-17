<?php

include "lib/Validator.php";

use CantEscape\Validator;

//Create new Validator
$v = new Validator();

var_dump(array(
    $v->email("someemail@mail.com")->email("one@two@.net", "james@me.com")->debrief()
));