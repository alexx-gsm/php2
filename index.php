<?php

require __DIR__ . '/autoload.php';

$articles = \App\Models\News::findAll();

$view = new \App\View();
$view->assign('articles', $articles);
$view->display('index');