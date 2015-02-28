<?php

include "vendor/autoload.php";

use CantEscape\Validator;

if (Validator::text("Hello World")->is()) {
    echo "valid";
} else {
    echo "invalid";
}