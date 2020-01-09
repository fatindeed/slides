<?php

namespace PHPUnitTutorial\Chapter2\Tests;

use PHPUnit\Framework\TestCase;
use PHPUnitTutorial\Chapter2\LogAnalyzer5;

class LogAnalyzer5Test extends TestCase
{
    public function fileDataProvider()
    {
        return [
            'badfile' => ["badfile.foo", false],
            'goodfile' => ["goodfile.slf", true],
        ];
    }

    /**
     * @dataProvider fileDataProvider
     */
    public function testIsValidLogFileName_WhenCalled_ChangeWasLastFileNameValid($filename, $expected)
    {
        $analyzer = new LogAnalyzer5();
        $result = $analyzer->isValidLogFileName($filename);
        // 对系统状态进行断言
        $this->assertEquals($expected, $analyzer->wasLastFileNameValid);
    }
}