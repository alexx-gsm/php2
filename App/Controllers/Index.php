<?php

namespace App\Controllers;

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
        $news = Article::findAll();
        $this->view->news = $news;
        $this->view->display(__DIR__ . '/../../Templates/Index/default.php');
    }

    public function actionOne()
    {
        $id = $_GET['id'] ?? null;
        if (null === $id || 0 == (int)$id) {
            $this->view->error = 'Неверный адрес новости';
            $this->view->display(__DIR__ . '/../../Templates/404.php');
            die;
        }

        $article = \App\Models\Article::findOneById($id);
        if (false === $article) {
            $this->view->error = 'Нет такой новости';
            $this->view->display(__DIR__ . '/../../Templates/404.php');
            die;
        }

        $this->view->article = $article;
        $this->view->display(__DIR__ . '/../../Templates/Index/one.php');
    }
}