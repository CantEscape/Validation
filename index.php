<?php

include "vendor/autoload.php";

use CantEscape\Validator;

if (Validator::number("-1001.33")->is()) {
    echo "valid";
} else {
    echo "invalid";
}