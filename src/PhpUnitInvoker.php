<?php declare(strict_types=1);
/**
 * Caller
 *
 * @author  Alwynn <alwynn.github@gmail.com>
 * @package byte/caller
 */
namespace Byte\Caller;

use SebastianBergmann\Invoker\Invoker;

/**
 * Invoker adapter for callback caller that uses PHPUnit's invoker.
 *
 * @author  Alwynn <alwynn.github@gmail.com>
 * @package byte/caller
 */
class PhpUnitInvoker implements CallerInterface
{
    /**
     * Invoker object
     *
     * @var Invoker
     * @see https://github.com/sebastianbergmann/php-invoker
     */
    protected $invoker;
    
    /**
     * Timeout for invoker
     *
     * @var int
     */
    protected $timeout;

    /**
     * @param Invoker $invoker PHPUnit invoker
     * @param integer $timeout Timeout
     */
    public function __construct(Invoker $invoker, int $timeout = 0)
    {
        $this->invoker = $invoker;
        $this->timeout = $timeout;
    }

    /** @inheritdoc */
    public function call($callback, $context = [])
    {
        return $this->invoker->invoke($callback, $context, $this->timeout);
    }
}
