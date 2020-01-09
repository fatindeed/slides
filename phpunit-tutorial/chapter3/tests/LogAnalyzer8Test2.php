<?php

namespace PHPUnitTutorial\Chapter2\Tests;

use PHPUnit\Framework\TestCase;
use PHPUnitTutorial\Chapter3\IWebService;
use PHPUnitTutorial\Chapter3\LogAnalyzer8;

class LogAnalyzer8Test2 extends TestCase
{
    public function testAnalyze_TooShortFileName_CallsWebService()
    {
        $tooShortFileName = "abc.ext";
        $mockService = $this->createMock(IWebService::class);
        $mockService->expects($this->once())
                    ->method('logError')
                    ->willReturn("Filename too short: {$tooShortFileName}");
        $logan = new LogAnalyzer8($mockService);
        $logan->analyze($tooShortFileName);
    }
}
