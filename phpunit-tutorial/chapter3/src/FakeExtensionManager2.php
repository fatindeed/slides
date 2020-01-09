<?php

namespace PHPUnitTutorial\Chapter3;

class FakeExtensionManager2 implements IExtensionManager
{
    /**
     * @var bool
     */
    public $willBeValid = false;

    /**
     * @var Exception
     */
    public $willThrow;

    /**
     * 判断文件名是否有效
     *
     * @param string $filename
     *
     * @return bool
     */
    public function isValid($filename)
    {
        if ($this->willThrow) {
            throw $this->willThrow;
        }
        return $this->willBeValid;
    }
}