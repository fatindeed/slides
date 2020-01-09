<?php

namespace PHPUnitTutorial\Chapter2\Tests;

use PHPUnit\Framework\TestCase;
use PHPUnitTutorial\Chapter3\FakeExtensionManager1;
use PHPUnitTutorial\Chapter3\LogAnalyzer4;

class LogAnalyzer4Test extends TestCase
{
    public function testIsValidLogFileName_SupportedExtension_ReturnsTrue()
    {
        // 设置要使用的存根，确保其返回true
        $stub = new FakeExtensionManager1();
        $stub->willBeValid = true;
        // 创建logan，注入存根
        $logan = new LogAnalyzer4($stub);
        $logan->manager = $stub;
        // 假设扩展名受支持的断言逻辑
        $result = $logan->isValidLogFileName("foobar.ext");
        $this->assertTrue($result);
    }
}
