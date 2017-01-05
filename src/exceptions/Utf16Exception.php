<?php
/**
 * Created by PhpStorm.
 * User: Михаил
 * Date: 05.01.2017
 * Time: 15:00
 */

namespace JsonParser;


use Exception;

class Utf16Exception extends Exception
{

    public function __construct(Exception $previous = null)
    {
        $code = defined("JSON_ERROR_UTF16") ? JSON_ERROR_UTF16 : null;

        parent::__construct("Single unpaired UTF-16 surrogate in unicode escape contained in the JSON string passed to json_encode()", $code, $previous);
    }
}