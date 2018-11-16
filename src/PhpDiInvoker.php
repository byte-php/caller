<?php declare(strict_types=1);
/**
 * Caller
 *
 * @author  Alwynn <alwynn.github@gmail.com>
 * @package byte/caller
 */
namespace Byte\Caller;

use Invoker\InvokerInterface;

/**
 * Invoker adapter for callback caller that uses PHP-DI invoker
 *
 * @author  Alwynn <alwynn.github@gmail.com>
 * @package byte/caller
 */
class PhpDiInvoker implements CallerInterface
{
    /**
     * Invoker object
     *
     * @var InvokerInterface
     * @see https://github.com/PHP-DI/Invoker
     */
    protected $invoker;

    /** @param Invoker $invoker PHP-DI invoker */
    public function __construct(InvokerInterface $invoker)
    {
        $this->invoker = $invoker;
    }

    /** @inheritdoc */
    public function call($callback, $context = [])
    {
        return $this->invoker->call($callback, $context);
    }
}
