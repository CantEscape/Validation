<?php

include "lib/Validator.php";

use CantEscape\Validator as v;

//Create new Validator
$v = new v();

var_dump(array(
    $v->email("someemail@mail.com")->email("one@two@.net", "james@me.com")->debrief()
));