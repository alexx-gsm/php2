<?php

namespace App\Controllers;

use App\Models\Article;
use App\Models\Author;

class Admin
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
        $this->view->display(__DIR__ . '/../../Templates/Admin/default.php');
    }

    public function actionEdit()
    {
        $id = $_GET['id'] ?? null;

        if (null !== $id && 0 != (int)$id) {
            $article = Article::findOneById($id);
        } else {
            $article = new Article();
        }

        $this->view->article = $article;
        $this->view->authors = Author::findAll();
        $this->view->display(__DIR__ . '/../../Templates/Admin/edit.php');
    }

    public function actionSave()
    {
        $data = $_GET['article'] ?? null;

        if (null !== $data) {
            $article = new Article();
            $article->fill($data)->save();
        }

        header('Location: /admin/');
        die;
    }

    public function actionDelete()
    {
        $id = $_GET['id'] ?? null;

        if (null === $id || 0 == (int)$id) {
            $this->view->error = 'Нет такой новости';
            $this->view->display(__DIR__ . '/../../Templates/404.php');
            die;
        }

        $article = Article::findOneById($id);

        if (empty($article)) {
            $this->view->error = 'Нет такой новости';
            $this->view->display(__DIR__ . '/../../Templates/404.php');
            die;
        }

        $article->delete();

        header('Location: /admin/');
        die;
    }
}