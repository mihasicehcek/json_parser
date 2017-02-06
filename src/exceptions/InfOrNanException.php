<?php

namespace JsonParser;

class InfOrNanException extends Exception
{

    public function __construct(Exception $previous = null)
    {
        $code = defined("JSON_ERROR_INF_OR_NAN") ? JSON_ERROR_INF_OR_NAN : null;

        parent::__construct("The value passed to json_encode() includes either NAN or INF", $code, $previous);
    }
}