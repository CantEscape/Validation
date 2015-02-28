<?php

include "vendor/autoload.php";

use CantEscape\Validator;

if (Validator::postcode("n1 5hj")->is()) {
    echo "valid";
} else {
    echo "invalid";
}