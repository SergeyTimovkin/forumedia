<?php

namespace app\controllers;

use Controller;

/**
 * Class Registration
 * @package app\controllers
 */
class Registration extends Controller
{

    public $folderView = 'registration/';
    /**
     * Registration constructor.
     *
     * Обращается к родительскому конструктору
     * Создаёт модель класса Registration
     *
     */
    public function __construct()
    {
        parent::__construct();
         $this->model = new \app\models\Registration();
    }


    /**
     * Функция проверяет есть ли в сессии юзер.
     *
     * Если юзер залогинен, то отправляем его на страницу "Вы уже залогинены"
     * Если нет, то отправляем на страницу регистрации
     *
     * @return void
     */

    public function index()
    {
        if ($_SESSION['username']) {
            header('Location: ' . SITE_ROOT . 'notification/pageYouLogged');
            exit;
        } else {
            $this->view->generate($this->folderView.'registration_page.php', 'template_page.php');
        }
    }

    /**
     * Функция проверяет существует ли в БД email
     *
     * @return void
     */
    public function existsEmail()
    {
        $this->model->existsEmail();
    }

    /**
     * Функция проверяет существует ли в БД Username
     *
     * @return void
     */
    public function existsLogin()
    {
        $this->model->existsLogin();
    }

    /**
     * Функция регистрирует пользователя
     *
     * @return void
     */
    public function registerUser()
    {
        $this->model->registerUser();
    }

}