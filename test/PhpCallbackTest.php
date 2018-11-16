<?php declare(strict_types=1);
/**
 * Caller
 *
 * @author  Alwynn <alwynn.github@gmail.com>
 * @package byte/caller
 */
namespace Byte\Caller;

use PHPUnit\Framework\TestCase;

class PhpCallbackTest extends TestCase
{
    public function testInstance()
    {
        $caller = new PhpCallback();
        
        $this->assertInstanceOf(CallerInterface::class, $caller);
    }
    
    /** @expectedException InvalidArgumentException */
    public function testCallOnInvalidCallback()
    {
        $caller = new PhpCallback();
        $caller->call(1);
    }
    
    /** @dataProvider provider_testCallOnValidCallback */
    public function testCallOnValidCallback($callback, $params, $output)
    {
        $caller = new PhpCallback();

        $this->assertSame($caller->call($callback, $params), $output);
    }
    
    public function provider_testCallOnValidCallback()
    {
        return require __DIR__ . '/includes/PhpCallbackTest.inc';
    }
}
