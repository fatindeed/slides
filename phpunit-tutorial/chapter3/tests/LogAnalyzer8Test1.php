<?php

namespace PHPUnitTutorial\Chapter2\Tests;

use PHPUnit\Framework\TestCase;
use PHPUnitTutorial\Chapter3\FakeWebService1;
use PHPUnitTutorial\Chapter3\LogAnalyzer8;

class LogAnalyzer8Test1 extends TestCase
{
    public function testAnalyze_TooShortFileName_CallsWebService()
    {
        $mockService = new FakeWebService1();
        $logan = new LogAnalyzer8($mockService);
        $tooShortFileName = "abc.ext";
        $logan->analyze($tooShortFileName);
        // 对模拟对象进行断言
        $this->assertEquals("Filename too short: {$tooShortFileName}", $mockService->lastError);
    }
}
