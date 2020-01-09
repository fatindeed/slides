<?php

$files = scandir(__DIR__);
foreach ($files as $file) {
    if (substr($file, 0, 7) == 'chapter') {
        $filepath = __DIR__ . '/' . $file . '/content.md';
        if (! file_exists($filepath)) {
            continue;
        }
        $content = '';
        $phpBlock = $shBlock = 0;
        $lines = file($filepath);
        foreach ($lines as $line) {
            $text = trim($line);
            if ($phpBlock) {
                if ($phpBlock == 1) {
                    if (substr($text, 0, 7) == '// src/' || substr($text, 0, 9) == '// tests/') {
                        $content .= $line;
                        $content .= getCode(__DIR__ . '/' . $file . '/' . substr($text, 3));
                        $phpBlock = 2;
                        continue;
                    } else {
                        $phpBlock = 0;
                    }
                } elseif ($phpBlock == 2) {
                    if ($text == '```') {
                        $phpBlock = 0;
                    } else {
                        continue;
                    }
                }
            } elseif ($shBlock) {
                if ($shBlock == 1) {
                    if (substr($text, 0, 34) == '/slides/phpunit-tutorial$ phpunit ') {
                        $content .= $line;
                        $content .= getPHPUnitOutput(substr($text, 34));
                        $shBlock = 2;
                        continue;
                    } else {
                        $shBlock = 0;
                    }
                } elseif ($shBlock == 2) {
                    if ($text == '```') {
                        $shBlock = 0;
                    } else {
                        continue;
                    }
                }
            } else {
                if ($text == '```php') {
                    $phpBlock = 1;
                } elseif ($text == '```sh') {
                    $shBlock = 1;
                }
            }
            $content .= $line;
        }
        file_put_contents($filepath, $content);
    }
}

function getCode($filename)
{
    if (substr($filename, -4) != '.php') {
        $filename .= '.php';
    }
    $lines = file($filename);
    if (empty($lines)) {
        trigger_error('File not found: ' . $filename, E_USER_ERROR);
    }
    $catch = false;
    $content = '';
    foreach ($lines as $line) {
        if (substr($line, 0, 6) == 'class ' || substr($line, 0, 9) == 'interface') {
            $catch = true;
        }
        if ($catch) {
            $content .= $line;
        }
    }
    return $content . (substr($content, - 1) != PHP_EOL ? PHP_EOL : '');
}

function getPHPUnitOutput($filename)
{
    exec('vendor/bin/phpunit '. $filename, $output);
    return implode(PHP_EOL, $output) . PHP_EOL;
}