<?php
/**
 *
 * @package Vendor_Module
 */

namespace Vendor\Module\Plugin;

use Vendor\Module\Model\Calculator;

/* For testing */
class Overload
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @param string $type
     */
    public function __construct($type = '+')
    {
        $this->type = $type;
    }

    /**
     * Modified to multiplication
     *
     * @param  Calculator $subject
     * @param  callable   $procced
     * @param  int|float  $left
     * @param  int|float  $right
     * @return int|float
     */
    public function aroundCalculate(
        Calculator $subject,
        callable $proceed,
        $left,
        $right
    ) {
        $result = null;
        switch ($this->type) {
            case '+':
                $result = $proceed($left, $right);
                break;

            case '-':
                $result = $left - $right;
                break;

            case '*':
                $result = $left * $right;
                break;

            case '/':
                $result = $left / $right;
                break;

            case '%':
                $result = $left % $right;
                break;
        }

        return $result;
    }
}
