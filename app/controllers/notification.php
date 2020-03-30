<?php

namespace app\controllers;

use Controller;

/**
 * Class Notification
 * @package app\controllers
 */
class Notification extends Controller
{

    public $folderViews = 'notifcation/';

    /**
     * Функция генерирует страницу 404
     *
     * @return void
     */
    public function page404()
    {
        $this->view->generate($this->folderViews . '404_page.php', 'template_page.php');
    }

    /**
     * Функция генерирует страницу "Вы залогинены"
     *
     * @return void
     */
    public function pageYouLogged()
    {
        $this->view->generate($this->folderViews . 'youLogged_page.php', 'template_page.php');
    }
}



