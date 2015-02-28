<?php

include "vendor/autoload.php";

use CantEscape\Validator;

if (Validator::email("joe@me.com")->ip("127.0.0.1")->is()) {
    echo "valid";
} else {
    echo "invalid";
}