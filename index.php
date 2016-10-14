<?php

require __DIR__ . '/autoload.php';

$db = new \App\Db();
var_dump($db); die;

$articles = \App\Models\News::findNLastItems(3);

$view = new \App\View();
$view->assign('articles', $articles);
$view->display('index');