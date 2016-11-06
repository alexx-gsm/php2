<?php

namespace App\Components;

use App\Config;
use App\TSingleton;

class Logger
{
    use TSingleton;

    protected $file;

    public function setConfig(string $confPath)
    {
        $config = Config::getInstance()->setConfig($confPath);
        $this->file = __DIR__ . '/../../' . $config->data['logger']['path'];

        return $this;
    }

    public function writeLog(\Exception $exception)
    {
        $data = [
            date('Y-m-d H:i:s'),
            $exception->getMessage(),
            $exception->getFile(),
            $exception->getLine()
        ];

        file_put_contents($this->file, implode($data, '; ') . PHP_EOL, FILE_APPEND);
    }

}