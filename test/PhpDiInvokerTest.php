<?php declare(strict_types=1);
/**
 * Caller
 *
 * @author  Alwynn <alwynn.github@gmail.com>
 * @package byte/caller
 */
namespace Byte\Caller;

use PHPUnit\Framework\TestCase;
use Invoker\InvokerInterface;

class PhpDiInvokerTest extends TestCase
{
    public function testInstance()
    {
        $invoker = $this->getMockForAbstractClass(InvokerInterface::class);
        $caller  = new PhpDiInvoker($invoker);
        
        $this->assertInstanceOf(CallerInterface::class, $caller);
    }
    
    public function testCall()
    {
        $callback = function () {
        };
        $params   = [1];
        $result   = 1;
        
        $invoker = $this->getMockForAbstractClass(InvokerInterface::class);
        $invoker
            ->expects($this->once())
            ->method('call')
            ->with($this->equalTo($callback), $this->equalTo($params))
            ->will($this->returnValue($result));
        $caller = new PhpDiInvoker($invoker);
        
        $this->assertSame($caller->call($callback, $params), $result);
    }
}
