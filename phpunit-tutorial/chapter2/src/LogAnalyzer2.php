<?php

namespace PHPUnitTutorial\Chapter2;

class LogAnalyzer2
{
    /**
     * 判断文件名是否有效，.slf结尾的文件名就是有效的，返回真
     *
     * @param string $filename
     */
    public function isValidLogFileName($filename)
    {
        if (! preg_match('/\.SLF$/', $filename)) {
            return false;
        }
        return true;
    }
}