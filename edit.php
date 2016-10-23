<?php

require __DIR__ . '/autoload.php';

$id = $_GET['id'] ?? null;

if (null !== $id && 0 != (int)$id) {
    $article = \App\Models\Article::findOneById($id);
} else {
    $article = new \App\Models\Article();
}

$view = new \App\View();
$view->article = $article;
$view->authors = \App\Models\Author::findAll();
$view->display('edit');