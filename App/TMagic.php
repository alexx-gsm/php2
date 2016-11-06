<?php

namespace App;

trait TMagic
{
    protected $__data = [];

    public function __set($name, $value)
    {
        $this->__data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->__data[$name] ?? false;
    }

    public function __isset($name)
    {
        return isset($this->__data[$name]);
    }

}