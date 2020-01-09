<?php

namespace PHPUnitTutorial\Chapter3;

class LogAnalyzer2Warning
{
    /*
     * @var IExtensionManager
     */
    private $manager;

    /*
     * @var ILog
     */
    private $log;

    /*
     * @var IWebService
     */
    private $svc;

    /**
     * 假设除了文件扩展名管理器，LogAnalyzer还依赖一个Web服务和一个日志服务，构造函数就可能变成这样
     *
     * @param IExtensionManager $mgr
     * @param ILog              $logger
     * @param IWebService       $service
     */
    public function __construct(IExtensionManager $mgr, ILog $logger, IWebService $service)
    {
        $this->manager = $mgr;
        $this->log = $logger;
        $this->svc = $service;
    }
}