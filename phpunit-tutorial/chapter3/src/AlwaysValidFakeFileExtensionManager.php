<?php

namespace PHPUnitTutorial\Chapter3;

class AlwaysValidFakeFileExtensionManager implements IExtensionManager
{
    /**
     * 判断文件名是否有效
     *
     * @param string $filename
     *
     * @return bool
     */
    public function isValid($filename)
    {
        return true;
    }
}