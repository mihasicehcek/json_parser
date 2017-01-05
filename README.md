# JsonParser
Simple wrapper over json_decode/json_encode php functions. Throws exceptions when decoding/encoding fails.

```php
try{
  $json = '{"integer":1';
  $result = \JsonParser\JsonParser::jsonDecode('{"integer":1');
}catch(\JsonParser\Exception $ex){
  print_r("Message: ".$ex->getMessage().", code: ".$ex->getCode()); //Message: Syntax error, code: 4
}

```
