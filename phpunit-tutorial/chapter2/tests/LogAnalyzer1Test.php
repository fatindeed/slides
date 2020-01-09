<?php

namespace PHPUnitTutorial\Chapter2\Tests;

use PHPUnit\Framework\TestCase;
use PHPUnitTutorial\Chapter2\LogAnalyzer1;

class LogAnalyzer1Test extends TestCase
{
    public function testIsValidLogFileName_BadExtension_ReturnsFalse()
    {
        $analyzer = new LogAnalyzer1();
        $result = $analyzer->isValidLogFileName("file_with_bad_extension.foo");
        $this->assertFalse($result);
    }
}