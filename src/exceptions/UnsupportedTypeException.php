<?php
/**
 * Created by PhpStorm.
 * User: Михаил
 * Date: 05.01.2017
 * Time: 15:00
 */

namespace JsonParser;


use Exception;

class UnsupportedTypeException extends Exception
{

    public function __construct(Exception $previous = null)
    {
        $code = defined("JSON_ERROR_UNSUPPORTED_TYPE") ? JSON_ERROR_UNSUPPORTED_TYPE : null;

        parent::__construct("A value of an unsupported type was given to json_encode(), such as a resource", $code, $previous);
    }
}