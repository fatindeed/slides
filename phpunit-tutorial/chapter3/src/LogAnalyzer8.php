<?php

namespace PHPUnitTutorial\Chapter3;

class LogAnalyzer8
{
    /*
     * @var IWebService
     */
    private $service;

    /**
     * 构造函数
     *
     * @param IWebService $service
     */
    public function __construct(IWebService $service)
    {
        $this->service = $service;
    }

    /**
     * 分析日志文件
     *
     * @param string $filename
     *
     * @return void
     */
    public function analyze($filename)
    {
        if (strlen($filename) < 8) {
            // 在产品代码中写错误日志
            $this->service->logError("Filename too short: {$filename}");
        }
    }
}