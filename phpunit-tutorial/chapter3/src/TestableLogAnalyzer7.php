<?php

namespace PHPUnitTutorial\Chapter3;

class TestableLogAnalyzer7 extends LogAnalyzer7
{
    /**
     * @var bool
     */
    public $isSupported = false;

    /**
     * 判断文件名是否有效
     *
     * @param string $filename
     *
     * @return bool
     */
    public function isValid($filename)
    {
        return $this->isSupported;
    }
}