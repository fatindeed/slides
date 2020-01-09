<?php

namespace PHPUnitTutorial\Chapter3;

class FakeExtensionManager1 implements IExtensionManager
{
    /**
     * @var bool
     */
    public $willBeValid = false;

    /**
     * 判断文件名是否有效
     *
     * @param string $filename
     *
     * @return bool
     */
    public function isValid($filename)
    {
        return $this->willBeValid;
    }
}