<?php

require __DIR__ . '/autoload.php';

$id = $_GET['id'] ?? null;

$view = new \App\View();

if (null === $id || 0 == (int)$id) {
    $view->assign('error', 'Неверный адрес новости');
    $view->display('404');
    die;
}

$article = (new \App\Models\News())::findOneById($id);

if (false === $article) {
    $view->assign('error', 'Нет такой новости');
    $view->display('404');
    die;
}

$view->assign('article', $article);
$view->display('article');