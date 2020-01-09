<?php

namespace PHPUnitTutorial\Chapter2\Tests;

use PHPUnit\Framework\TestCase;
use PHPUnitTutorial\Chapter2\LogAnalyzer4;

class LogAnalyzer4Test extends TestCase
{
    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage filename has to be provided.
     */
    public function testIsValidLogFileName_EmptyFileName_ThrowsInvalidArgumentException()
    {
        $analyzer = new LogAnalyzer4();
        $result = $analyzer->isValidLogFileName("");
    }
}