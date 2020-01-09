## 第二章

### 单元测试项目示例


## 回顾

- 什么是单元测试
- 一个单元测试可见的最终结果有哪些
- 单元测试的特征
- 什么是集成测试



## LogAn项目介绍

- <span style="font-size: 0.8em;">我们用作范例进行测试的项目一开始会很简单，只包含一个类。随着内容的展开，我们会对项目进行扩展，加入新的类和功能。我们把这个项目起名为LogAn（“log and notification”的简写）。</span>
- <span style="font-size: 0.8em;">场景是这样的：公司有很多内部产品，用于在客户场地监控公司的应用程序。所有这些监控产品都会写日志文件，日志文件存放在一个特定的目录中。日志文件的格式是你们公司自己制定的，无法用现有的第三方软件进行解析。你的任务是实现一个产品，对这些日志文件进行分析，在其中搜索特定的情况和事件，这个产品就是LogAn。找到特定的情况和事件后，这个产品应该通知相关的人员。</span>



## 从测试只有一个方法的简单类开始

```php
// src/LogAnalyzer1.php
class LogAnalyzer1
{
    /**
     * 判断文件名是否有效，.slf结尾的文件名就是有效的，返回真
     *
     * @param string $filename
     */
    public function isValidLogFileName($filename)
    {
        if (preg_match('/\.SLF$/', $filename)) {
            return false;
        }
        return true;
    }
}
```


## 测试方法的命名

- <span style="font-size: 0.8em;">test[UnitOfWorkName]_[ScenarioUnderTest]_[ExpectedBehavior]</span>
- <span style="font-size: 0.8em;">UnitOfWorkName 被测试的方法、一组方法或者一组类。</span>
- <span style="font-size: 0.8em;">Scenario 测试进行的假设条件，例如“登入失败”“无效用户”或“密码正确”。你可以用测试场景描述传给公开方法的参数，或者单元测试进行时系统的初始状态，例如：“系统内存不足”“无用户存在”或“用户已经存在”。</span>
- <span style="font-size: 0.8em;">ExpectedBehavior：在测试场景指定的条件下，你对被测方法行为的预期。测试方法的行为有三种可能的结果：返回一个值（一个真实值，或者一个异常），改变系统状态（例如在系统中添加了一个用户，导致在下一次登录时系统的行为发生变化），或调用一个第三方系统（例如一个外部的Web服务）。</span>



## 编写第一个测试

- 在我们对IsValidLogFileName方法进行的测试中，场景是你给方法传入一个有效的文件名，预期行为是方法返回一个值true。我们可以把这个测试方法命名为testIsValidFileName_BadExtension_RetrunFalse()。
- 一个单元测试通常主要包含三个行为：
    1. 准备（Arrange）对象，创建对象，进行必要的设置
    2. 操作（Act）对象
    3. 断言（Assert）某件事情是预期的


## 编写单元测试

```php
// tests/LogAnalyzer1Test.php
class LogAnalyzer1Test extends TestCase
{
    public function testIsValidLogFileName_BadExtension_ReturnsFalse()
    {
        $analyzer = new LogAnalyzer1();
        $result = $analyzer->isValidLogFileName("file_with_bad_extension.foo");
        $this->assertFalse($result);
    }
}
```


## 运行单元测试

```sh
/slides/phpunit-tutorial$ phpunit chapter2/tests/LogAnalyzer1Test
PHPUnit 6.5.14 by Sebastian Bergmann and contributors.

F                                                                   1 / 1 (100%)

Time: 18 ms, Memory: 4.00MB

There was 1 failure:

1) PHPUnitTutorial\Chapter2\Tests\LogAnalyzer1Test::testIsValidLogFileName_BadExtension_ReturnsFalse
Failed asserting that true is false.

/app/chapter2/tests/LogAnalyzer1Test.php:14

FAILURES!
Tests: 1, Assertions: 1, Failures: 1.
```


## 修改代码使测试通过

```php
// src/LogAnalyzer2.php
class LogAnalyzer2
{
    /**
     * 判断文件名是否有效，.slf结尾的文件名就是有效的，返回真
     *
     * @param string $filename
     */
    public function isValidLogFileName($filename)
    {
        if (! preg_match('/\.SLF$/', $filename)) {
            return false;
        }
        return true;
    }
}
```


## 运行修改后的单元测试

```sh
/slides/phpunit-tutorial$ phpunit chapter2/tests/LogAnalyzer2Test1
PHPUnit 6.5.14 by Sebastian Bergmann and contributors.

.                                                                   1 / 1 (100%)

Time: 22 ms, Memory: 4.00MB

OK (1 test, 1 assertion)
```



## 添加正检验的测试

```php
// tests/LogAnalyzer2Test2.php
class LogAnalyzer2Test2 extends TestCase
{
    public function testIsValidLogFileName_BadExtension_ReturnsFalse()
    {
        $analyzer = new LogAnalyzer2();
        $result = $analyzer->isValidLogFileName("file_with_bad_extension.foo");
        $this->assertFalse($result);
    }

    public function testIsValidLogFileName_GoodExtensionLowercase_ReturnsTrue()
    {
        $analyzer = new LogAnalyzer2();
        $result = $analyzer->isValidLogFileName("file_with_good_extension.slf");
        $this->assertTrue($result);
    }

    public function testIsValidLogFileName_GoodExtensionUppercase_ReturnsTrue()
    {
        $analyzer = new LogAnalyzer2();
        $result = $analyzer->isValidLogFileName("file_with_good_extension.SLF");
        $this->assertTrue($result);
    }
}
```


## 运行正检验单元测试

```sh
/slides/phpunit-tutorial$ phpunit chapter2/tests/LogAnalyzer2Test2
PHPUnit 6.5.14 by Sebastian Bergmann and contributors.

.F.                                                                 3 / 3 (100%)

Time: 19 ms, Memory: 4.00MB

There was 1 failure:

1) PHPUnitTutorial\Chapter2\Tests\LogAnalyzer2Test2::testIsValidLogFileName_GoodExtensionLowercase_ReturnsTrue
Failed asserting that false is true.

/app/chapter2/tests/LogAnalyzer2Test2.php:21

FAILURES!
Tests: 3, Assertions: 3, Failures: 1.
```


## 修改代码使测试通过

```php
// src/LogAnalyzer3.php
class LogAnalyzer3
{
    /**
     * 判断文件名是否有效，.slf结尾的文件名就是有效的，返回真
     *
     * @param string $filename
     */
    public function isValidLogFileName($filename)
    {
        if (! preg_match('/\.SLF$/i', $filename)) {
            return false;
        }
        return true;
    }
}
```


## 运行修改后的单元测试

```sh
/slides/phpunit-tutorial$ phpunit chapter2/tests/LogAnalyzer3Test1
PHPUnit 6.5.14 by Sebastian Bergmann and contributors.

...                                                                 3 / 3 (100%)

Time: 20 ms, Memory: 4.00MB

OK (3 tests, 3 assertions)
```



## 使用参数重构测试

```php
// tests/LogAnalyzer3Test2.php
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
```


## 运行使用参数重构后的单元测试

```sh
/slides/phpunit-tutorial$ phpunit chapter2/tests/LogAnalyzer3Test2
PHPUnit 6.5.14 by Sebastian Bergmann and contributors.

...                                                                 3 / 3 (100%)

Time: 18 ms, Memory: 4.00MB

OK (3 tests, 3 assertions)
```



## 加入异常

```php
// src/LogAnalyzer4.php
class LogAnalyzer4
{
    /**
     * 判断文件名是否有效，.slf结尾的文件名就是有效的，返回真
     *
     * @param string $filename
     */
    public function isValidLogFileName($filename)
    {
        if (empty(trim($filename))) {
            throw new InvalidArgumentException("filename has to be provided.");
        }
        if (! preg_match('/\.SLF$/i', $filename)) {
            return false;
        }
        return true;
    }
}
```


## 检验预期的异常

```php
// tests/LogAnalyzer4Test.php
class LogAnalyzer4Test extends TestCase
{
    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage filename has to be provided.
     */
    public function testIsValidLogFileName_EmptyFileName_ThrowsInvalidArgumentException()
    {
        $analyzer = new LogAnalyzer4();
        $result = $analyzer->isValidLogFileName("");
    }
}
```


## 运行检验预期异常的单元测试

```sh
/slides/phpunit-tutorial$ phpunit chapter2/tests/LogAnalyzer4Test
PHPUnit 6.5.14 by Sebastian Bergmann and contributors.

.                                                                   1 / 1 (100%)

Time: 19 ms, Memory: 4.00MB

OK (1 test, 2 assertions)
```



## 测试系统状态的改变而非返回值

```php
// src/LogAnalyzer5.php
class LogAnalyzer5
{
    /**
     * @var bool
     */
    public $wasLastFileNameValid;

    /**
     * 判断文件名是否有效，.slf结尾的文件名就是有效的，返回真
     *
     * @param string $filename
     */
    public function isValidLogFileName($filename)
    {
        // 改变系统状态
        $this->wasLastFileNameValid = false;
        if (empty(trim($filename))) {
            throw new InvalidArgumentException("filename has to be provided.");
        }
        if (! preg_match('/\.SLF$/i', $filename)) {
            return false;
        }
        // 改变系统状态
        $this->wasLastFileNameValid = true;
        return true;
    }
}
```


## 对系统状态进行断言

```php
// tests/LogAnalyzer5Test.php
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
```


## 运行对系统状态进行断言的单元测试

```sh
/slides/phpunit-tutorial$ phpunit chapter2/tests/LogAnalyzer5Test
PHPUnit 6.5.14 by Sebastian Bergmann and contributors.

..                                                                  2 / 2 (100%)

Time: 18 ms, Memory: 4.00MB

OK (2 tests, 2 assertions)
```
