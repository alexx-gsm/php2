<?php

namespace App\Controllers;

use App\Components\E403Exception;
use App\View;

abstract class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function action($action, $message = '')
    {
        if (method_exists($this, 'access') && false === $this->access()) {
            throw new E403Exception('E403: Доступ запрещен');
        }
        $this->$action($message);
    }

}