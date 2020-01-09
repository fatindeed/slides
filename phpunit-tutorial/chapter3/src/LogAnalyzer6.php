<?php

namespace PHPUnitTutorial\Chapter3;

class LogAnalyzer6
{
    /**
     * 判断文件名是否有效
     *
     * @param string $filename
     *
     * @return bool
     */
    public function isValidLogFileName($filename)
    {
        return $this->getManager()->isValid($filename);
    }

    /**
     * 获取文件扩展名管理器
     *
     * @return IExtensionManager
     */
    protected function getManager()
    {
        return new FileExtensionManager();
    }
}