<?php

namespace PHPUnitTutorial\Chapter2\Tests;

use PHPUnit\Framework\TestCase;
use PHPUnitTutorial\Chapter2\LogAnalyzer3;

class LogAnalyzer3Test2 extends TestCase
{
    public function fileDataProvider()
    {
        return [
            'BadExtension_ReturnsFalse' => ["file_with_bad_extension.foo", false],
            'GoodExtensionLowercase_ReturnsTrue' => ["file_with_good_extension.slf", true],
            'GoodExtensionUppercase_ReturnsTrue' => ["file_with_good_extension.SLF", true],
        ];
    }

    /**
     * @dataProvider fileDataProvider
     */
    public function testIsValidLogFileName_VariousExtension_ChecksThem($filename, $expected)
    {
        $analyzer = new LogAnalyzer3();
        $result = $analyzer->isValidLogFileName($filename);
        $this->assertEquals($expected, $result);
    }
}