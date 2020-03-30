<?php
/**
 * Константа корня сайта
 */
define('SITE_ROOT', $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . "/");

/**
 * Константы конфигурации баз данных
 */
define('DB_HOST', 'localhost');
define('DB_NAME', 'forumedia');
define('DB_USER', 'root');
define('DB_PASS', '');

/**
 * Константы логина и пароля админки
 */
define('admin_login', 'admin');
define('admin_password', 'e10adc3949ba59abbe56e057f20f883e');

/**
 * Количество клиентов для пагинации
 */
define('numberRowForPagination', 10);