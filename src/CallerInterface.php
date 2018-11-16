<?php declare(strict_types=1);
/**
 * Caller
 *
 * @author  Alwynn <alwynn.github@gmail.com>
 * @package byte/caller
 */
namespace Byte\Caller;

/**
 * Caller interface
 *
 * @author  Alwynn <alwynn.github@gmail.com>
 * @package byte/caller
 */
interface CallerInterface
{
    /**
     * Invoke a callable
     *
     * @param  mixed $callback Callable to be invoked
     * @param  array $context  Context for callable
     * @return mixed           Return from invoked callable
     */
    public function call($callback, $context = []);
}
