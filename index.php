<?php

include "vendor/autoload.php";

use CantEscape\Validator;

$v = new Validator();

$v->email("joe");
var_dump($v->email("james@me.com")->debrief());