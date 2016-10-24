<?php

require __DIR__ . '/autoload.php';

$id = $_GET['id'] ?? null;

$view = new \App\View();

if (null === $id || 0 == (int)$id) {
    $view->error = 'Неверный адрес новости';
    $view->display(__DIR__ . '/Templates/404.php');
    die;
}

$article = \App\Models\Article::findOneById($id);

if (false === $article) {
    $view->error = 'Нет такой новости';
    $view->display(__DIR__ . '/Templates/404.php');
    die;
}

$view->article = $article;
$view->display(__DIR__ . '/Templates/article.php');