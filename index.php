<?php

require __DIR__ . '/autoload.php';

$news = (new \App\Models\News())::findNLastItems(3);

$view = new \App\View();
$view->assign('news', $news);
$view->display();