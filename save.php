<?php

require __DIR__ . '/autoload.php';

$data = $_GET['article'] ?? null;

if (null !== $data) {
    $article = new \App\Models\Article();
    $article->fill($data)->save();
}

header('Location: /admin.php');
die;