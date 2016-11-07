<?php

use App\Components\DbException;
use App\Components\E403Exception;
use App\Components\E404Exception;
use ME\MultiException;
use App\Controllers\Error;
use App\Helpers\Helpers;

require_once __DIR__ . '/autoload.php';
require_once __DIR__ . '/vendor/autoload.php';

$route = new \App\Route();
$route->parseRequest($_SERVER['REQUEST_URI']);

try {
    $route->run();
} catch (DbException $e) {
    Helpers::logError($e);
    Helpers::sendEmail($e);
    (new Error())->action('actionDefault', $e->getMessage());
} catch (MultiException $e) {
    foreach ($e as $error) {
        echo $error->getMessage();
    }
} catch (E403Exception $e) {
    Helpers::logError($e);
    (new Error())->action('actionE403', $e->getMessage());
} catch (E404Exception $e) {
    Helpers::logError($e);
    (new Error())->action('actionE404', $e->getMessage());
} catch (Exception $e) {
    echo $e->getMessage();
} catch (Throwable $e) {
    echo $e->getMessage();
}