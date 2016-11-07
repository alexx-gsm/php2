<?php

namespace App\Controllers;

use App\Components\E404Exception;
use App\Models\Article;

class Index
    extends Controller
{
    public function access():bool
    {
        return true;
    }

    public function actionDefault()
    {
        $news = Article::findNLastItems(3);
        if (false === $news) {
            throw new E404Exception('Нет новостей');
        }

        $this->view->news = $news;
        $this->view->display('/Index/default.twig');
    }

    public function actionOne()
    {
        $id = $_GET['id'] ?? null;
        if (null === $id || 0 == (int)$id) {
            throw new E404Exception('Ошибка 404 - не найдено');
        }

        $article = Article::findOneById($id);
        if (false === $article) {
            throw new E404Exception('Ошибка 404 - не найдено');
        }

        $this->view->article = $article;
        $this->view->display('/Index/one.twig');
    }
}