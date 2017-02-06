<?php

namespace JsonParser;

class DepthException extends Exception
{

    public function __construct(Exception $previous = null)
    {
        parent::__construct("Maximum stack depth exceeded", JSON_ERROR_DEPTH, $previous);
    }
}