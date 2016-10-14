<?php

namespace App\Config;

class Config
    extends \stdClass
{
    public $data;

    public function __construct()
    {
        $this->data = include __DIR__ . '/../Config.php';
    }

}