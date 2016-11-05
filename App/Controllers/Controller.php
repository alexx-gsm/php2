<?php

namespace App\Controllers;

use App\View;

abstract class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function action($action)
    {
        if (false === $this->access()) {
            $this->view->error = 'Доступ закрыт';
            $this->view->display(__DIR__ . '/../../Templates/403.php');
            die;
        }
        $this->$action();
    }
}