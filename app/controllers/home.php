<?php

namespace app\controllers;

use Controller;

/**
 * Class Home
 * @package app\controllers
 */
class Home extends Controller
{
    /**
     * Home constructor
     *
     * Обращается к родительскому конструктору
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Генерирует страницу Home на шаблонной странице template
     *
     * @return void
     */
    public function index()
    {
        $this->view->generate('home_page.php', 'template_page.php');
    }
}