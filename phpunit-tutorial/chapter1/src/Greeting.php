<?php

namespace PHPUnitTutorial\Chapter1;

class Greeting
{
    /**
     * Get the greeting text.
     * 
     * @param string $name
     *
     * @return string
     */
    public function getText($name)
    {
        return 'Hello, ' . ($name ?: 'Guest');
    }
}