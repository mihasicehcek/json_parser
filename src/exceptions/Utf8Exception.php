<?php
/**
 * Created by PhpStorm.
 * User: Михаил
 * Date: 05.01.2017
 * Time: 15:00
 */

namespace JsonParser;


use Exception;

class Utf8Exception extends Exception
{

    public function __construct(Exception $previous = null)
    {
        $code = defined("JSON_ERROR_UTF8") ? JSON_ERROR_UTF8 : null;

        parent::__construct("Malformed UTF-8 characters, possibly incorrectly encoded", $code, $previous);
    }
}