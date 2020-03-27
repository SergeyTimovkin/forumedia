<?php
/**
 * Запускаем сессию
 */
session_start();

/**
 * Подключаем файл конфигурации БД
 */
require_once "config.php";

/**
 * Подключаем файл загрузки основных классов
 */
require_once "app/bootstrap.php";