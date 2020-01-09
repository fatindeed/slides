<?php

namespace PHPUnitTutorial\Chapter3;

class LogAnalyzer7
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
        return $this->isValid($filename);
    }

    /**
     * 判断文件名是否有效
     *
     * @param string $filename
     *
     * @return bool
     */
    public function isValid($filename)
    {
        $mgr = new FileExtensionManager();
        return $mgr->isValid($filename);
    }
}