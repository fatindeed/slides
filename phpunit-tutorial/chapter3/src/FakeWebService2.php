<?php

namespace PHPUnitTutorial\Chapter3;

class FakeWebService2 implements IWebService
{
    /**
     * @var Exception
     */
    public $toThrow;

    /**
     * 记录错误日志
     *
     * @param string $message
     *
     * @return void
     */
    public function logError($message)
    {
        if ($this->toThrow) {
            throw $this->toThrow;
        }
    }
}