# JsonParser

## Simple Eample
Simple wrapper over json_decode/json_encode php functions. Throws exceptions when decoding/encoding fails.

```php
try{
  $json = '{"integer":1';
  $result = \JsonParser\JsonParser::jsonDecode('{"integer":1');
}catch(\JsonParser\Exception $ex){
  print_r("Message: ".$ex->getMessage().", code: ".$ex->getCode()); //Message: Syntax error, code: 4
}

try{
  $a = new stdClass();
  $b = new stdClass();
  $a->b = $b;
  $b->a = $a;
  $result = \JsonParser\JsonParser::jsonEncode($a);
}catch(\JsonParser\Exception $ex){
  print_r("Message: ".$ex->getMessage().", code: ".$ex->getCode()); //Message: The object or array passed to json_encode include recursive references and cannot be encoded, code: 7
}
```

Library has two public methods \JsonParser\JsonParser::jsonDecode() for serialization and \JsonParser\JsonParser::jsonEncode() for deserialization. Full description you can see at [json_decode](http://php.net/manual/ru/function.json-decode.php "json_decode") and [json_encode](http://php.net/manual/ru/function.json-encode.php "json_encode").
But unlike native function library throws exceptions when decoding/encoding went wrong. There are exceptions for each de/serialization error. Full list of error you can see at [json_last_error](http://php.net/manual/ru/function.json-last-error.php "json_last_error")

## Exceptions

Library detects and throws such exceptions

* \JsonParser\SyntaxException - Syntax error.
* \JsonParser\ControlCharacterException - Control character error, possibly incorrectly encoded.
* \JsonParser\DepthException - The maximum stack depth has been exceeded.
* \JsonParser\InfOrNanException - The value passed to json_encode() includes either NAN or INF.
* \JsonParser\InvalidPropertyNameException - A key starting with \u0000 character was in the string passed to json_decode() when decoding a JSON object into a PHP object.
* \JsonParser\RecursionException - The object or array passed to json_encode include recursive references and cannot be encoded.
* \JsonParser\StateMismatchException - State mismatch (invalid or malformed JSON).
* \JsonParser\UnsupportedTypeException - A value of an unsupported type was given to json_encode(), such as a resource.
* \JsonParser\Utf8Exception - Malformed UTF-8 characters, possibly incorrectly encoded.
* \JsonParser\Utf16Exception - Single unpaired UTF-16 surrogate in unicode escape contained in the JSON string passed to json_encode().

All those exceptions extends base \JsonParser\Exception
