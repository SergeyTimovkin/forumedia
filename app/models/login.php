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
        $username = preg_replace('/\s+/', '', $_POST['username']);
        $pass = md5($_POST['pass']);
        $sql = "SELECT * FROM `table_users` WHERE  username ='{$username}' and pass = '{$pass}'";
        $result = $this->db->DBRequest($sql);
        if ($result->num_rows) {
            $_SESSION['username'] = $username;
        } else {
            echo 'incorrectUser';
        }

    }

    /**
     * Функция возвращает все данные юзера
     *
     * @return array|null
     */
    public function getUserData()
    {
        $sql = "SELECT `username`, `email`, `last_name`, `first_name`, `birth_date`, `avatar` FROM `table_users` WHERE username = '{$_SESSION['username']}'";
        $result = $this->db->DBRequest($sql);
        $profileData = mysqli_fetch_assoc($result);
        return $profileData;
    }
}