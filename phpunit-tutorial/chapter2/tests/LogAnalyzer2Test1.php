<?php

namespace PHPUnitTutorial\Chapter2\Tests;

use PHPUnit\Framework\TestCase;
use PHPUnitTutorial\Chapter2\LogAnalyzer2;

class LogAnalyzer2Test1 extends TestCase
{
    public function testIsValidLogFileName_BadExtension_ReturnsFalse()
    {
        $analyzer = new LogAnalyzer2();
        $result = $analyzer->isValidLogFileName("file_with_bad_extension.foo");
        $this->assertFalse($result);
    }
}