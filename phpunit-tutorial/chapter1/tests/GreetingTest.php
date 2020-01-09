<?php

namespace PHPUnitTutorial\Chapter1\Tests;

use PHPUnit\Framework\TestCase;
use PHPUnitTutorial\Chapter1\Greeting;

class GreetingTest extends TestCase
{
    public function testGreetingWithName()
    {
        $greeting = new Greeting;
        $displayText = $greeting->getText('James');
        $this->assertEquals($displayText, 'Hello, James');
    }

    public function testGreetingWithoutName()
    {
        $greeting = new Greeting;
        $displayText = $greeting->getText(null);
        $this->assertEquals($displayText, 'Hello, Guest');
    }
}