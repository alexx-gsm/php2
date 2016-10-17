<?php

require __DIR__ . '/autoload.php';

$news = \App\Models\Article::findNLastItems(3);

$view = new \App\View();
$view->assign('news', $news);
$view->display('index');