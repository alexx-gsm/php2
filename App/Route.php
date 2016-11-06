<?php

namespace App;

use App\Components\DbException;
use App\Components\E403Exception;
use App\Components\E404Exception;
use App\Components\Logger;
use App\Components\MultiException;
use App\Controllers\Error;
use Exception;
use Throwable;

class Route
{
    protected $controller;
    protected $action;

    public function __construct()
    {
    }

    public function parseRequest($request)
    {
        $positionParams = strpos($request, '?');
        if (false !== $positionParams) {
            $request = substr($request, 0, $positionParams);
        }
        $request = explode('/', $request);
        $path = [];
        foreach ($request as $value) {
            if (!empty($value)) {
                $path[] = $value;
            }
        }
        $ctrlClassName = 'App\Controllers\\';
        $this->action = 'action';
        for ($i=0; $i<count($path)-2; $i++) {
            $ctrlClassName .= $path[$i] ? ucfirst($path[$i]): 'Index';
            $ctrlClassName .= '\\';
        }
        $ctrlClassName .= isset($path[$i]) && !empty($path[$i]) ? ucfirst($path[$i]) : 'Index';
        $this->controller = new $ctrlClassName;
        $this->action .= isset($path[$i+1]) && !empty($path[$i+1]) ? ucfirst($path[$i+1]) : 'Default';
    }

    public function run()
    {
        try {
             $this->controller->action($this->action);
        } catch (DbException $e) {
            $this->logError($e);
            (new Error())->action('actionDefault', $e->getMessage());
        } catch (MultiException $e) {
            foreach ($e as $error) {
                echo $error->getMessage();
            }
        } catch (E403Exception $e) {
            $this->logError($e);
            (new Error())->action('actionE403', $e->getMessage());
        } catch (E404Exception $e) {
            $this->logError($e);
            (new Error())->action('actionE404', $e->getMessage());
        } catch (Exception $e) {
            echo $e->getMessage();
        } catch (Throwable $e) {
            echo $e->getMessage();
        }
    }

    public function logError(Exception $exception)
    {
        Logger::getInstance()
            ->setConfig(__DIR__ . '/../Config.php')
            ->writeLog($exception);

    }
}