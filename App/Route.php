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
        $positionParams = strpos($request, '?');
        if (false !== $positionParams) {
            $request = substr($request, 0, $positionParams);
        }
        $request = explode('/', $request);
        $path = [];
        foreach ($request as $value) {
            if (!empty($value)) {
                $path[] = $value;
            }
        }
        $ctrlClassName = 'App\Controllers\\';
        $this->action = 'action';
        for ($i=0; $i<count($path)-2; $i++) {
            $ctrlClassName .= $path[$i] ? ucfirst($path[$i]): 'Index';
            $ctrlClassName .= '\\';
        }
        $ctrlClassName .= isset($path[$i]) && !empty($path[$i]) ? ucfirst($path[$i]) : 'Index';
        $this->controller = new $ctrlClassName;
        $this->action .= isset($path[$i+1]) && !empty($path[$i+1]) ? ucfirst($path[$i+1]) : 'Default';
    }

    public function run()
    {
        $this->controller->action($this->action);
    }
}