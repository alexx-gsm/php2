<?php

namespace App;


class Config
{
    use TSingleton;

    public $data;

    protected function __construct()
    {
    }

    public function setConfig(string $path = __DIR__ . '/../Config.php')
    {
        if (is_readable($path)) {
            $this->data = include $path;
        };

        return $this;
    }

}