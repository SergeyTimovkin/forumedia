<?php
/**
 * Подключаем основные классы
 */
require_once "core/Controller.php";
require_once "core/DB.php";
require_once "core/Router.php";
require_once "core/Model.php";
require_once "core/View.php";

/**
 * Запускаем роутер
 */
Router::startRouting();