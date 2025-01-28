<?php

namespace App;

use \InvalidArgumentException;

class AddService
{
    public function add($number1, $number2)
    {
        if (!is_numeric($number1) || !is_numeric($number2)) {
            throw new InvalidArgumentException("Input must be a number");
        }
        return $number1 + $number2;
    }
}
