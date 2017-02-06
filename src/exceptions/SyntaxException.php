<?php

namespace JsonParser;


class SyntaxException extends Exception
{

    public function __construct(Exception $previous = null)
    {
        parent::__construct("Syntax error", JSON_ERROR_SYNTAX, $previous);
    }
}