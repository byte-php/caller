<?php declare(strict_types=1);
/**
 * Caller
 *
 * @author  Alwynn <alwynn.github@gmail.com>
 * @package byte/caller
 */

function PhpCallbackTest_testCallbackFunction($param)
{
    return $param;
};
    
class PhpCallbackTest_TestStaticCallbackClass
{
    public static function testCall($param)
    {
        return $param;
    }
}

class PhpCallbackTest_TestCallbackClass
{
    public function testCall($param)
    {
        return $param;
    }
}

class PhpCallbackTest_TestCallbackCallableClass
{
    public function __invoke($param)
    {
        return $param;
    }
}

return [
    ['PhpCallbackTest_testCallbackFunction', [1], 1],
    ['PhpCallbackTest_TestStaticCallbackClass::testCall', [2], 2],
    [['PhpCallbackTest_TestStaticCallbackClass', 'testCall'], [3], 3],
    [[new PhpCallbackTest_TestCallbackClass, 'testCall'], [4], 4],
    [new PhpCallbackTest_TestCallbackCallableClass, [5], 5],
];
