<?php

/**
 * Class Router
 */
class Router
{
    /**
     * Функция запуска роутера
     *
     * Функция забирает урл.
     * Выбирает и подключает контроллер, экшн
     */
    static function startRouting()
    {
        /* Контроллер и действие по умолчанию */

        $controller_name = 'Home';
        $action_name = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);



        if (!empty($routes[1])) {
            $controller_name = $routes[1];
        }

        if (!empty($routes[2])) {
            $action_name = $routes[2];
        }

        $controller_file = strtolower($controller_name) . '.php';
        $controller_path = "app/controllers/" . $controller_file;


        if (file_exists($controller_path)) {
            include $controller_path;
        } else {
            header('Location: ' . SITE_ROOT .  'notification/page404');
            exit;
        }


        $model_name = $controller_name;
        $model_file = strtolower($model_name) . '.php';
        $model_path = "app/models/" . $model_file;
        if (file_exists($model_path)) {
            include "app/models/" . $model_file;
        }

        $targetController = "app\\controllers\\" . $controller_name;
        $controller = new $targetController;

        $action = $action_name;
        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            header('Location: ' . SITE_ROOT . 'notification/page404');
            exit;
        }
    }
}