<?php

namespace App;


trait TSingleton
{
    static $instance;

    protected function __construct()
    {
    }

    protected function __clone()
    {
    }

    public static function instance($class)
    {

    }
}