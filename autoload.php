<?php

function __autoload($className)
{
    $className = str_replace('\\', '/', $className);
    $fileName = __DIR__ . '/' . $className . '.php';
    if (is_readable($fileName)) {
        require $fileName;
    }
}