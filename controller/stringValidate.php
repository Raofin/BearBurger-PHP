<?php

    function checkLength($string, $minLength)
    {
        $length = strlen($string);
        return $length > $minLength && $length < 16;
    }

    function removeWhitespaces($string)
    {
        return preg_replace('/\s+/', '', $string);
    }