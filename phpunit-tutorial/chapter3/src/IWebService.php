<?php

namespace PHPUnitTutorial\Chapter3;

interface IWebService
{
    /**
     * 记录错误日志
     *
     * @param string $message
     *
     * @return void
     */
    public function logError($message);
}