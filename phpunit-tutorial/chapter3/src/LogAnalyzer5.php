<?php

namespace PHPUnitTutorial\Chapter3;

class LogAnalyzer5
{
    /*
     * @var IExtensionManager
     */
    private $manager;

    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->manager = ExtensionManagerFactory::create();
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