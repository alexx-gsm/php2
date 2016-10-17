<?php

namespace App\Config;

use App\TSingleton;

class Config
{
    use TSingleton;

    public $data;

    protected function __construct()
    {
        $this->data = include __DIR__ . '/../Config.php';
    }

}