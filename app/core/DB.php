<?php

/**
 * Class DB
 *
 * Класс для работы с БД - Singleton
 */

class DB
{
    /**
     * @var $_instance null|mysqli
     */
    private static $_instance = null;

    /**
     * DB constructor.
     *
     * Создаёт подключение к БД
     */
    private function __construct()
    {
        $this->_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (mysqli_connect_error()) {
            trigger_error("Failed to connect to MySQL: " . mysqli_connect_error(), E_USER_ERROR);
        }
    }

    /**
     * Запрещаем клонирование
     */
    private function __clone()
    {
    }

    /**
     * Запрещаем сериализацию
     */
    private function __wakeup()
    {
    }

    /**
     * Функция возвращает инициализацию
     *
     * @return DB|mysqli|null
     */
    public static function getInstance()
    {
        if (self::$_instance != null) {
            return self::$_instance;
        }

        return new self;
    }

    /**
     * Функция возвращает результат запроса в БД
     *
     * @param string $querry
     * @return bool|mysqli_result
     */
    public function DBRequest($querry)
    {
        $querryResult = mysqli_query($this->_connection, $querry);
        return $querryResult;
    }
}