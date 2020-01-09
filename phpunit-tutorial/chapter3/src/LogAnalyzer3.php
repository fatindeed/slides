<?php

namespace PHPUnitTutorial\Chapter3;

use Exception;

class LogAnalyzer3
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
        try {
            return $this->manager->isValid($filename);
        } catch (Exception $e) {
            return false;
        }
    }
}