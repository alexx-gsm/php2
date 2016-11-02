<?php

require_once __DIR__ . '/autoload.php';

$route = new \App\Route();
$route->parseRequest(explode('/', $_SERVER['REQUEST_URI']));
$route->run();