<?php

namespace PHPUnitTutorial\Chapter1\Tests;

use PHPUnit\Framework\TestCase;
use PHPUnitTutorial\Chapter1\Calculator1;

class Calculator1Test extends TestCase
{
    public function testAdd_AssertEquals()
    {
        $calculator = new Calculator1;
        $sum = $calculator->add(18.1, 11.8);
        $this->assertEquals($sum, 29.9);
    }

    public function testAdd_AssertTrue()
    {
        $calculator = new Calculator1;
        $sum = $calculator->add(18.1, 11.8);
        $this->assertTrue($sum == 29.9);
    }
}