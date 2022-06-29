<?php

namespace APP\Model;

class Validation
{
    public static function validateName(string $name):bool
    {
        return mb_strlen($name) > 2;
    }

    public static function validateNumber(float $number)
    {
        return $number > 0;
    }
}