<?php

namespace PHPUnitTutorial\Chapter2;

use InvalidArgumentException;

class LogAnalyzer4
{
    /**
     * 判断文件名是否有效，.slf结尾的文件名就是有效的，返回真
     *
     * @param string $filename
     */
    public function isValidLogFileName($filename)
    {
        if (empty(trim($filename))) {
            throw new InvalidArgumentException("filename has to be provided.");
        }
        if (! preg_match('/\.SLF$/i', $filename)) {
            return false;
        }
        return true;
    }
}