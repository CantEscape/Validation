<?php

include "vendor/autoload.php";

use CantEscape\Validator;

if (Validator::visa("4000-0000-0000-0000")->is()) {
    echo "valid";
} else {
    echo "invalid";
}