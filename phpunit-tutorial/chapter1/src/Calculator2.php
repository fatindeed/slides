<?php

namespace PHPUnitTutorial\Chapter1;

class Calculator2
{
    /**
     * Add function.
     *
     * @param float $a
     * @param float $b
     *
     * @return float
     */
    public function add($a, $b)
    {
        return bcadd($a, $b, 2);
    }
}