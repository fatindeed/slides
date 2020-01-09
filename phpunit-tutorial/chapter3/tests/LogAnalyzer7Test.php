<?php

namespace PHPUnitTutorial\Chapter2\Tests;

use PHPUnit\Framework\TestCase;
use PHPUnitTutorial\Chapter3\TestableLogAnalyzer7;

class LogAnalyzer7Test extends TestCase
{
    public function testOverrideTestWithoutStub()
    {
        $logan = new TestableLogAnalyzer7();
        $logan->isSupported = true;
        // 假设扩展名受支持的断言逻辑
        $result = $logan->isValidLogFileName("foobar.ext");
        $this->assertTrue($result);
    }
}
