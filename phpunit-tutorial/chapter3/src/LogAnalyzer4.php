<?php

namespace PHPUnitTutorial\Chapter3;

class LogAnalyzer4
{
    /*
     * @var IExtensionManager
     */
    public $manager;

    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->manager = new FileExtensionManager();
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