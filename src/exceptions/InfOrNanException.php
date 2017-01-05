<?php
/**
 * Created by PhpStorm.
 * User: Михаил
 * Date: 05.01.2017
 * Time: 15:00
 */

namespace JsonParser;


use Exception;

class InfOrNanException extends Exception
{

    public function __construct(Exception $previous = null)
    {
        $code = defined("JSON_ERROR_INF_OR_NAN") ? JSON_ERROR_INF_OR_NAN : null;

        parent::__construct("The value passed to json_encode() includes either NAN or INF", $code, $previous);
    }
}