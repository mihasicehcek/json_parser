<?php
/**
 * Created by PhpStorm.
 * User: Михаил
 * Date: 05.01.2017
 * Time: 15:00
 */

namespace JsonParser;


use Exception;

class RecursionException extends Exception
{

    public function __construct(Exception $previous = null)
    {
        $code = defined("JSON_ERROR_RECURSION") ? JSON_ERROR_RECURSION : null;
        parent::__construct("The object or array passed to json_encode include recursive references and cannot be encoded", $code, $previous);
    }
}