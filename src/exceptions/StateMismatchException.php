<?php
/**
 * Created by PhpStorm.
 * User: Михаил
 * Date: 05.01.2017
 * Time: 15:00
 */

namespace JsonParser;


use Exception;

class StateMismatchException extends Exception
{

    public function __construct(Exception $previous = null)
    {
        parent::__construct("State mismatch (invalid or malformed JSON)", JSON_ERROR_STATE_MISMATCH, $previous);
    }
}