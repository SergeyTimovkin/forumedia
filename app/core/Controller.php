<?php

/**
 * Родительский Class Controller
 */
class Controller
{
    /**
     * @var object model
     * @var object view
     */
    public $model;
    public $view;

    /**
     * Controller constructor.
     *
     * Создаёт экземпляр класса View
     */
    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * Действие по умолчанию
     */
    public function index()
    {

    }

}