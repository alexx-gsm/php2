<?php

namespace App\Controllers;


class Error extends Controller
{
    public function actionDefault(string $e = 'Unknown error')
    {
        $this->view->error = $e;
        $this->view->display('/Error/default.twig');
    }

    public function actionE403(string $e = 'Доступ запрещен')
    {
        $this->view->error = $e;
        $this->view->display('/Error/403.twig');
    }

    public function actionE404(string $e = 'Запрошенный ресурс не найден')
    {
        $this->view->error = $e;
        $this->view->display('/Error/404.twig');
    }

}