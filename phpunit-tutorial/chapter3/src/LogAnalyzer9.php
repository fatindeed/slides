<?php

namespace PHPUnitTutorial\Chapter3;

use Exception;

class LogAnalyzer9
{
    /*
     * @var IWebService
     */
    private $service;

    /*
     * @var IEmailService
     */
    private $email;

    /**
     * 构造函数
     *
     * @param IWebService $service
     */
    public function __construct(IWebService $service, IEmailService $email)
    {
        $this->service = $service;
        $this->email = $email;
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
            try {
                $this->service->logError("Filename too short: {$filename}");
            } catch (Exception $e) {
                $this->email->sendEmail("john.doe@domain.tld", "Log failed", $e->getMessage());
            }
        }
    }
}