<?php

require_once __DIR__ . '/autoload.php';

$route = new \App\Route();
$route->parseRequest($_SERVER['REQUEST_URI']);
$route->run();