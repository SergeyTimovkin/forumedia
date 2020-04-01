<?php

namespace app\models;

use Model, DB;

/**
 * Class Login
 * @package app\models
 */
class Login extends Model
{
    /**
     * Login constructor.
     *
     * Создаёт подключение к БД
     */
    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    /**
     * Функция логинит Юзера
     *
     * @return void
     */
    public function loginUser()
    {
        $login = preg_replace('/\s+/', '', $_POST['enter_login']);
        $password = md5($_POST['enter_password']);
        $sql = "SELECT * FROM `clients` WHERE  login ='{$login}' and password = '{$password}'";
        $result = $this->db->DBRequest($sql);
        if ($result->num_rows) {
            $_SESSION['username'] = $login;
            echo true;
        } else {
            echo false;
        }

    }

    /**
     * Функция возвращает все данные юзера
     *
     * @return array|null
     */
    public function getUserData()
    {
        $sql = "SELECT `login`, `email`, `surname`, `name`, `phone`, `image`, `address` FROM clients WHERE login = '{$_SESSION['username']}'";
        $result = $this->db->DBRequest($sql);
        $profileData = mysqli_fetch_assoc($result);
        return $profileData;
    }
}