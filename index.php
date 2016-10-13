<?php

require __DIR__ . '/autoload.php';

$articles = (new \App\Models\News())::findNLastItems(3);

$view = new \App\View();
$view->assign('articles', $articles);
$view->display('index');