<?php

namespace JsonParser;


class ControlCharacterException extends Exception
{

    public function __construct(Exception $previous = null)
    {
        parent::__construct("Control character error, possibly incorrectly encoded", JSON_ERROR_CTRL_CHAR, $previous);
    }
}