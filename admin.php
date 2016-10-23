<?php

require __DIR__ . '/autoload.php';

$news = \App\Models\Article::findAll();

$view = new \App\View();
$view->news = $news;
$view->display('admin');