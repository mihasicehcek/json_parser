<?php

namespace JsonParser;

class InvalidPropertyNameException extends Exception
{

    public function __construct(Exception $previous = null)
    {
        $code = defined("JSON_ERROR_INVALID_PROPERTY_NAME") ? JSON_ERROR_INVALID_PROPERTY_NAME : null;

        parent::__construct('A key starting with \u0000 character was in the string passed to json_decode() when decoding a JSON object into a PHP object', $code, $previous);
    }
}