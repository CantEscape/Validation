<?php

include "vendor/autoload.php";

use CantEscape\Validator;

if (Validator::purenumber(100133)->is()) {
    echo "valid";
} else {
    echo "invalid";
}