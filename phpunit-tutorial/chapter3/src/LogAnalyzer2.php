<?php

namespace PHPUnitTutorial\Chapter3;

class LogAnalyzer2
{
    /*
     * @var IExtensionManager
     */
    private $manager;

    /**
     * 构造函数
     *
     * @param IExtensionManager $mgr
     */
    public function __construct(IExtensionManager $mgr)
    {
        $this->manager = $mgr;
    }

    /**
     * 判断文件名是否有效
     *
     * @param string $filename
     *
     * @return bool
     */
    public function isValidLogFileName($filename)
    {
        return $this->manager->isValid($filename);
    }
}