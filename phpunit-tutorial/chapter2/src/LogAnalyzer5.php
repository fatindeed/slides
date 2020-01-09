<?php

namespace PHPUnitTutorial\Chapter2;

class LogAnalyzer5
{
    /**
     * @var bool
     */
    public $wasLastFileNameValid;

    /**
     * 判断文件名是否有效，.slf结尾的文件名就是有效的，返回真
     *
     * @param string $filename
     */
    public function isValidLogFileName($filename)
    {
        // 改变系统状态
        $this->wasLastFileNameValid = false;
        if (empty(trim($filename))) {
            throw new InvalidArgumentException("filename has to be provided.");
        }
        if (! preg_match('/\.SLF$/i', $filename)) {
            return false;
        }
        // 改变系统状态
        $this->wasLastFileNameValid = true;
        return true;
    }
}