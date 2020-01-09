<?php

namespace PHPUnitTutorial\Chapter3;

class FakeWebService1 implements IWebService
{
    /**
     * @var string
     */
    public $lastError;

    /**
     * 记录错误日志
     *
     * @param string $message
     *
     * @return void
     */
    public function logError($message)
    {
        $this->lastError = $message;
    }
}