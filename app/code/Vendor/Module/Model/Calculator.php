<?php
/**
 *
 * @package Vendor_Module
 */

namespace Vendor\Module\Model;

/* For testing */
class Calculator
{
    /**
     * @param  int|float $left
     * @param  int|float $right
     * @return int|float
     */
    public function calculate($left, $right)
    {
        return $left + $right;
    }
}
