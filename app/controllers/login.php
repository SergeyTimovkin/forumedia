<?php

namespace app\controllers;

use Controller;

/**
 * Class Login
 * @package app\controllers
 */
class Login extends Controller
{
    public $folderViews = 'login/';

    /**
     * Login constructor.
     *
     * Обращается к родительскому конструктору
     * Создаёт модель класса Login
     */
    public function __construct()
    {
        parent::__construct();
        $this->model = new \app\models\Login();
    }

    /**
     * Функция проверяет есть ли в сессии юзер.
     *
     * Если юзер залогинен, то отправляем его на страницу "Вы уже залогинены"
     * Если нет, то отправляем на страницу логина
     *
     * @return void
     */
    public function index()
    {
        if ($_SESSION['username']) {
            header('Location: ' . SITE_ROOT . 'notification/pageYouLogged');
            exit;
        }
    }

    /**
     * Функция залогинивания пользователя
     *
     * @return void
     */
    public function loginUser()
    {
        $this->model->loginUser();
    }

    /**
     * Функция страницы профиля
     *
     * Если юзер залогинен, то получаем из модели данные юзера и гененируем страницу профиля.
     * Если нет, то отправляем на страницу логина
     *
     * @return void
     */
    public function profilePage()
    {
        if ($_SESSION['username']) {
            $profileData = $this->model->getUserData();
            $this->view->generate($this->folderViews . 'profile_page.php', 'template_page.php', $profileData);
        } else {
            header('Location: ' . SITE_ROOT . '/login');
            exit;
        }
    }
    public function editClientDataPage()
    {
        if ($_SESSION['username']) {
            $profileData = $this->model->getUserData();
            $this->view->generate($this->folderViews . 'editClientData_page.php', 'template_page.php', $profileData);
        } else {
            header('Location: ' . SITE_ROOT . '/login');
            exit;
        }
    }
    public function getLogin()
    {
        $this->model->getLogin();
    }
    public function editClientData()
    {
       $this->model->editClientData();
    }

    /**
     * Функция удаляет пользователя из сессии
     *
     * @return void
     */
    public function logout()
    {
        unset($_SESSION['username']);
        session_destroy();
        header('Location: ' . SITE_ROOT . "home");
        exit;
    }

}