<?php

function __autoload($className)
{
    $className = str_replace('\\', '/', $className);
    $fileName = __DIR__ . '/' . $className . '.php';
    require $fileName;
}