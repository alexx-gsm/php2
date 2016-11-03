<?php

namespace App;


class Route
{
    protected $controller;
    protected $action;

    public function __construct()
    {
    }

    public function parseRequest($request)
    {
        $path = explode('/?', $request)[0] or explode('?', $request)[0];
        $request = false != $path ? explode('/', $path) : $request;
        $ctrlClassName = 'App\Controllers\\';
        $this->action = 'action';
        for ($i=1; $i<count($request)-2; $i++) {
            $ctrlClassName .= $request[$i] ? ucfirst($request[$i]): 'Index';
            $ctrlClassName .= '\\';
        }
        $ctrlClassName .= isset($request[$i]) && !empty($request[$i]) ? ucfirst($request[$i]) : 'Index';
        $this->controller = new $ctrlClassName;
        $this->action .= isset($request[$i+1]) && !empty($request[$i+1]) ? ucfirst($request[$i+1]) : 'Default';
    }

    public function run()
    {
        $this->controller->action($this->action);
    }
}