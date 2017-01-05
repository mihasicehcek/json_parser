<?php
/**
 * Created by PhpStorm.
 * User: Михаил
 * Date: 05.01.2017
 * Time: 15:00
 */

namespace JsonParser;


use Exception;

class SyntaxException extends Exception
{

    public function __construct(Exception $previous = null)
    {
        parent::__construct("Syntax error", JSON_ERROR_SYNTAX, $previous);
    }
}