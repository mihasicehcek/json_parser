<?php
/**
 * Created by PhpStorm.
 * User: Михаил
 * Date: 05.01.2017
 * Time: 15:00
 */

namespace JsonParser;


class ControlCharacterException extends Exception
{

    public function __construct(Exception $previous = null)
    {
        parent::__construct("Control character error, possibly incorrectly encoded", JSON_ERROR_CTRL_CHAR, $previous);
    }
}