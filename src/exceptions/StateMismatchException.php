<?php

namespace JsonParser;


class StateMismatchException extends Exception
{

    public function __construct(Exception $previous = null)
    {
        parent::__construct("State mismatch (invalid or malformed JSON)", JSON_ERROR_STATE_MISMATCH, $previous);
    }
}