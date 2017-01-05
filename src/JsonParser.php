<?php
/**
 * Created by PhpStorm.
 * User: Михаил
 * Date: 05.01.2017
 * Time: 14:51
 */

namespace JsonParser;


class JsonParser
{
    /**
     * Decodes a JSON string
     * @link http://php.net/manual/en/function.json-decode.php
     *
     * @param string $json The json string being decoded.
     *
     * @param bool $assoc When TRUE, returned objects will be converted into associative arrays.
     *
     * @param int $depth User specified recursion depth.
     *
     * @param int $options Bitmask of JSON decode options. Currently only JSON_BIGINT_AS_STRING is supported (default is to cast large integers as floats)
     *
     * @throws Exception
     *
     * @return mixed the value encoded in json in appropriate PHP type
     * */
    public static function jsonDecode($json, $assoc = false, $depth = 512, $options = 0)
    {
        $result = json_decode($json, $assoc, $depth, $options);
        self::detectError();
        return $result;
    }

    /**
     * Returns the JSON representation of a value
     * @link http://php.net/manual/en/function.json-encode.php
     *
     * @param mixed $value The value being encoded. Can be any type except a resource. All string data must be UTF-8 encoded.
     *
     * @param int $options [optional] See http://php.net/manual/en/json.constants.php
     *
     * @param int $depth Set the maximum depth. Must be greater than zero.
     *
     * @return string a JSON encoded string on success or <b>FALSE</b> on failure.
     */
    public static function jsonEncode($value, $options = 0, $depth = 512)
    {
        $result = json_encode($value, $options, $depth);
        self::detectError();
        return $result;
    }

    /**
     * Detect error
     *
     * @throws Exception
     * */
    private static function detectError()
    {
        $lastError = json_last_error();
        if($lastError != JSON_ERROR_NONE){
            switch ($lastError) {
                case JSON_ERROR_DEPTH:
                    throw new DepthException();
                case JSON_ERROR_STATE_MISMATCH:
                    throw new StateMismatchException();
                case JSON_ERROR_CTRL_CHAR:
                    throw new ControlCharacterException();
                case JSON_ERROR_SYNTAX:
                    throw new SyntaxException();
            }

            if(defined("JSON_ERROR_UTF8") && $lastError == JSON_ERROR_UTF8){
                throw new Utf8Exception();
            }
            if(defined("JSON_ERROR_RECURSION") && $lastError == JSON_ERROR_RECURSION){
                throw new RecursionException();
            }
            if(defined("JSON_ERROR_INF_OR_NAN") && $lastError == JSON_ERROR_INF_OR_NAN){
                throw new InfOrNanException();
            }
            if(defined("JSON_ERROR_UNSUPPORTED_TYPE") && $lastError == JSON_ERROR_UNSUPPORTED_TYPE){
                throw new UnsupportedTypeException();
            }
            if(defined("JSON_ERROR_INVALID_PROPERTY_NAME") && $lastError == JSON_ERROR_INVALID_PROPERTY_NAME){
                throw new InvalidPropertyNameException();
            }
            if(defined("JSON_ERROR_UTF16") && $lastError == JSON_ERROR_UTF16){
                throw new Utf16Exception();
            }

        }
    }
}