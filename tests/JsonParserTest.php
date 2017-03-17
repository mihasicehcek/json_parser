<?php
/**
 * Created by PhpStorm.
 * User: Михаил
 * Date: 05.01.2017
 * Time: 15:38
 */

namespace JsonParser;


use PHPUnit\Framework\TestCase;

class JsonParserTest extends TestCase
{

    public function testJsonEncoding(){
        $result = JsonParser::jsonEncode(["integer" => 1, "string" => "str", "array" => [1, 2, 3], "obj" => ["a" => "b"]]);
        $this->assertEquals($result, '{"integer":1,"string":"str","array":[1,2,3],"obj":{"a":"b"}}');
    }

    public function testJsonDecoding(){
        $result = JsonParser::jsonDecode('{"integer":1,"string":"str","array":[1,2,3],"obj":{"a":"b"}}');
        $this->assertEquals($result->integer, 1);
        $this->assertEquals($result->string, "str");
    }

    public function testJsonDecodingSyntaxError(){
        $this->expectException(SyntaxException::class);
        JsonParser::jsonDecode('{"integer":1');
    }

    public function testStateMismatchError(){
        $this->expectException(StateMismatchException::class);
        JsonParser::jsonDecode('{"j": 1 ] }');
    }

    public function testRecursionError(){
        $this->expectException(RecursionException::class);

        $a = new \stdClass();
        $b = new \stdClass();
        $a->b = $b;
        $b->a = $a;
        JsonParser::jsonEncode($a);
    }

    public function testInfOrNanError(){
        $this->expectException(InfOrNanException::class);

        $arr = ["a" => INF];
        JsonParser::jsonEncode($arr);
    }
    
    public function testEncodeUTF8Exception()
    {
        $this->expectException(Utf8Exception::class);
        $this->expectExceptionMessage('Malformed UTF-8 characters, possibly incorrectly encoded');

        JsonHandler::encode("\xB1\x31");
    }

}
