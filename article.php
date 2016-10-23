<?php

require __DIR__ . '/autoload.php';

$id = $_GET['id'] ?? null;

$view = new \App\View();

if (null === $id || 0 == (int)$id) {
    $view->error = 'Неверный адрес новости';
    $view->display('404');
    die;
}

$article = \App\Models\Article::findOneById($id);

if (false === $article) {
    $view->error = 'Нет такой новости';
    $view->display('404');
    die;
}

$view->article = $article;
$view->display('article');