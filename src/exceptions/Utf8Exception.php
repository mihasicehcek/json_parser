<?php

namespace JsonParser;

class Utf8Exception extends Exception
{

    public function __construct(Exception $previous = null)
    {
        $code = defined("JSON_ERROR_UTF8") ? JSON_ERROR_UTF8 : null;

        parent::__construct("Malformed UTF-8 characters, possibly incorrectly encoded", $code, $previous);
    }
}