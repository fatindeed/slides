<?php

namespace PHPUnitTutorial\Chapter2\Tests;

use Exception;
use PHPUnit\Framework\TestCase;
use PHPUnitTutorial\Chapter3\FakeExtensionManager2;
use PHPUnitTutorial\Chapter3\LogAnalyzer3;

class LogAnalyzer3Test extends TestCase
{
    public function testIsValidLogFileName_ExtManagerThrowsException_ReturnsFalse()
    {
        // 设置要使用的存根，使其抛出异常
        $stub = new FakeExtensionManager2();
        $stub->willThrow = new Exception("Fake exception");
        // 创建logan，注入存根
        $logan = new LogAnalyzer3($stub);
        // 假设扩展名受支持的断言逻辑
        $result = $logan->isValidLogFileName("foo.bar");
        $this->assertFalse($result);
    }
}
