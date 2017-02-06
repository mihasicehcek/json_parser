<?php

namespace JsonParser;

class UnsupportedTypeException extends Exception
{

    public function __construct(Exception $previous = null)
    {
        $code = defined("JSON_ERROR_UNSUPPORTED_TYPE") ? JSON_ERROR_UNSUPPORTED_TYPE : null;

        parent::__construct("A value of an unsupported type was given to json_encode(), such as a resource", $code, $previous);
    }
}