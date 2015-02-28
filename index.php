<?php

include "vendor/autoload.php";

use CantEscape\Validator;

if (Validator::phone("02055555555")->is()) {
    echo "valid";
} else {
    echo "invalid";
}