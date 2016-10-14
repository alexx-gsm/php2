<?php

namespace App\Config;

use App\TSingleton;

/**
 * Class Config
 * @package App\Config
 *
 */
class Config
{
    use TSingleton;

    public $data;

    protected function __construct()
    {
        $this->data = include __DIR__ . '/../Config.php';
    }

}