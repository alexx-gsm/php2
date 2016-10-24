<?php

require __DIR__ . '/autoload.php';

$news = \App\Models\Article::findNLastItems(3);

$view = new \App\View();
$view->news = $news;
$view->display(__DIR__ . '/Templates/index.php');