<?php

spl_autoload_register(function ($class) {
    $slices = explode('\\', $class);
    $project = array_shift($slices);
    if ($project == 'PHPUnitTutorial') {
        $chapter = array_shift($slices);
        require __DIR__ . '/' . strtolower($chapter) . '/src/' . implode('//', $slices) . '.php';
    }
});