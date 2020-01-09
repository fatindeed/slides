<?php

namespace PHPUnitTutorial\Chapter2\Tests;

use PHPUnit\Framework\TestCase;
use PHPUnitTutorial\Chapter2\LogAnalyzer3;

class LogAnalyzer3Test1 extends TestCase
{
    public function testIsValidLogFileName_BadExtension_ReturnsFalse()
    {
        $analyzer = new LogAnalyzer3();
        $result = $analyzer->isValidLogFileName("file_with_bad_extension.foo");
        $this->assertFalse($result);
    }

    public function testIsValidLogFileName_GoodExtensionLowercase_ReturnsTrue()
    {
        $analyzer = new LogAnalyzer3();
        $result = $analyzer->isValidLogFileName("file_with_good_extension.slf");
        $this->assertTrue($result);
    }

    public function testIsValidLogFileName_GoodExtensionUppercase_ReturnsTrue()
    {
        $analyzer = new LogAnalyzer3();
        $result = $analyzer->isValidLogFileName("file_with_good_extension.SLF");
        $this->assertTrue($result);
    }
}