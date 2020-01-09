<?php

namespace PHPUnitTutorial\Chapter3;

class LogAnalyzer1
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
        $mgr = new FileExtensionManager();
        return $mgr->isValid($filename);
    }
}