<?php declare(strict_types=1);
/**
 * Caller
 *
 * @author  Alwynn <alwynn.github@gmail.com>
 * @package byte/caller
 */
namespace Byte\Caller;

use PHPUnit\Framework\TestCase;
use SebastianBergmann\Invoker\Invoker;

class PhpUnitInvokerTest extends TestCase
{
    public function testInstance()
    {
        $invoker = new Invoker(); // Invoker is final and cannot be mocked :/
        $caller  = new PhpUnitInvoker($invoker);
        
        $this->assertInstanceOf(CallerInterface::class, $caller);
    }
    
    public function testCall()
    {
        $params   = [1];
        $result   = 1;
        $callback = function ($param) {
            return $param;
        };
        
        $invoker = new Invoker(); // Invoker is final and cannot be mocked :/
        $caller  = new PhpUnitInvoker($invoker);
        
        $this->assertSame($caller->call($callback, $params), $result);
    }
}
