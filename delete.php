<?php

require __DIR__ . '/autoload.php';

$id = $_GET['id'] ?? null;

if (null === $id || 0 == (int)$id) {
    $view->error = 'Нет такой новости';
    $view->display(__DIR__ . '/Templates/404.php');
    die;
}

$article = \App\Models\Article::findOneById($id);

if (empty($article)) {
    $view->error = 'Нет такой новости';
    $view->display(__DIR__ . '/Templates/404.php');
    die;
}

$article->delete();

header('Location: /admin.php');
die;