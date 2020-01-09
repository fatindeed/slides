<?php

namespace PHPUnitTutorial\Chapter2\Tests;

use PHPUnit\Framework\TestCase;
use PHPUnitTutorial\Chapter3\FakeExtensionManager1;
use PHPUnitTutorial\Chapter3\TestableLogAnalyzer6;

class LogAnalyzer6Test extends TestCase
{
    public function testOverrideTest()
    {
        // 设置要使用的存根，确保其返回true
        $stub = new FakeExtensionManager1();
        $stub->willBeValid = true;
        // 创建logan，注入存根
        $logan = new TestableLogAnalyzer6($stub);
        // 假设扩展名受支持的断言逻辑
        $result = $logan->isValidLogFileName("foobar.ext");
        $this->assertTrue($result);
    }
}
