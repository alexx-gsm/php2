<?php

namespace App\Helpers;

use App\Components\Logger;
use App\Config;
use Exception;
use Swift_Mailer;
use Swift_MailTransport;
use Swift_Message;

class Helpers
{
    public static function logError(Exception $exception)
    {
        Logger::getInstance()
            ->setConfig(__DIR__ . '/../config.php')
            ->writeLog($exception);
    }

    public static function sendEmail(Exception $e)
    {
        $config = Config::getInstance()->setConfig(__DIR__ . '/../config.php');
        $emailTo = $config->data['mail']['admin'];
        $emailFrom = $config->data['mail']['site'];

        $transport = Swift_MailTransport::newInstance();
        $mailer = Swift_Mailer::newInstance($transport);
        $message = Swift_Message::newInstance('DB Error')
            ->setFrom([$emailFrom])
            ->setTo([$emailTo])
            ->setBody(implode([
                date('Y-m-d H:i:s'),
                $e->getMessage(),
                $e->getFile(),
                $e->getLine()
            ], '; '));

        $mailer->send($message);
    }
}