<?php declare(strict_types=1);
/**
 * Caller
 *
 * @author  Alwynn <alwynn.github@gmail.com>
 * @package byte/caller
 */
namespace Byte\Caller;

use InvalidArgumentException;

/**
 * Invoker adapter for callback caller that uses PHP-DI invoker
 *
 * @author  Alwynn <alwynn.github@gmail.com>
 * @package byte/caller
 */
class PhpCallback implements CallerInterface
{
    /** @inheritdoc */
    public function call($callback, $context = [])
    {
        if (! is_callable($callback)) {
            throw new InvalidArgumentException('PhpCallback::call() expects a valid callback as a first argument');
        }
        
        return call_user_func_array($callback, $context);
    }
}
