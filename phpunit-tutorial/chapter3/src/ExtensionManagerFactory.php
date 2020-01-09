<?php

namespace PHPUnitTutorial\Chapter3;

class ExtensionManagerFactory
{
    /**
     * @var IExtensionManager
     */
    private static $customManager;

    /**
     * 创建一个ExtensionManager
     *
     * @return IExtensionManager
     */
    public static function create()
    {
        if (self::$customManager) {
            return self::$customManager;
        }
        return new FileExtensionManager;
    }

    /**
     * 设置自定义ExtensionManager
     *
     * @param IExtensionManager $mgr
     *
     * @return void
     */
    public static function setManager(IExtensionManager $mgr)
    {
        self::$customManager = $mgr;
    }
}