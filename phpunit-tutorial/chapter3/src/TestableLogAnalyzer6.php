<?php

namespace PHPUnitTutorial\Chapter3;

class TestableLogAnalyzer6 extends LogAnalyzer6
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
     * 获取文件扩展名管理器
     *
     * @return IExtensionManager
     */
    protected function getManager()
    {
        return $this->manager;
    }
}