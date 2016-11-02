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
        $ctrlRequest = isset($request[1]) && !empty($request[1]) ? $request[1] : 'Index';
        $ctrlClassName = 'App\Controllers\\' . $ctrlRequest;
        $this->controller = new $ctrlClassName;

        $actRequest = isset($request[2]) && !empty($request[2]) ? $request[2] : 'Default';
        $this->action = 'action' . $actRequest;
    }

    public function run()
    {
        $this->controller->action($this->action);
    }
}