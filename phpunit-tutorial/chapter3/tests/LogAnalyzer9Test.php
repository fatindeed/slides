<?php

namespace PHPUnitTutorial\Chapter2\Tests;

use Exception;
use PHPUnit\Framework\TestCase;
use PHPUnitTutorial\Chapter3\FakeEmailService;
use PHPUnitTutorial\Chapter3\FakeWebService2;
use PHPUnitTutorial\Chapter3\LogAnalyzer9;

class LogAnalyzer9Test extends TestCase
{
    public function testAnalyze_TooShortFileName_CallsWebService()
    {
        $stubService = new FakeWebService2();
        $stubService->toThrow = new Exception("Fake exception");
        $mockEmail = new FakeEmailService();
        $logan = new LogAnalyzer9($stubService, $mockEmail);
        $tooShortFileName = "abc.ext";
        $logan->analyze($tooShortFileName);
        // 对模拟对象进行断言
        $this->assertEquals("john.doe@domain.tld", $mockEmail->to);
        $this->assertEquals("Log failed", $mockEmail->subject);
        $this->assertEquals("Fake exception", $mockEmail->body);
    }
}
