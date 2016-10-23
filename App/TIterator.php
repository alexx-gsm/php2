<?php

namespace App;


trait TIterator
{
    public function current()
    {
        return current($this->__data);
    }

    public function next()
    {
        next($this->__data);
    }

    public function key()
    {
        return key($this->__data);
    }

    public function valid()
    {
        return null !== key($this->__data);
    }

    public function rewind()
    {
        reset($this->__data);
    }
}