<?php

namespace App\Controllers;


class Error extends Controller
{
    public function actionDefault(string $e = 'Unknown error')
    {
        $this->view->error = $e;
        $this->view->display(__DIR__ . '/../../Templates/Error/default.php');
    }

    public function actionE403(string $e = 'Доступ запрещен')
    {
        $this->view->error = $e;
        $this->view->display(__DIR__ . '/../../Templates/Error/403.php');
    }

    public function actionE404(string $e = 'Запрошенный ресурс не найден')
    {
        $this->view->error = $e;
        $this->view->display(__DIR__ . '/../../Templates/Error/404.php');
    }

}