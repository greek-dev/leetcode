<?php

namespace src;

class Helper
{
    public static function print($value): void
    {
        echo "<pre>" . print_r($value, true) . "</pre>";
    }
}