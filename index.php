<?php

require_once __DIR__ . '/autoload.php';
require_once __DIR__ . '/vendor/autoload.php';

$route = new \App\Route();
$route->parseRequest($_SERVER['REQUEST_URI']);
$route->run();