<?php

namespace app\models;

use Model, DB;

/**
 * Class Registration
 * @package app\models
 */
class Registration extends Model
{
    /**
     * Registration constructor.
     *
     * Создаёт подключение к БД
     */
    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    /**
     * Функция загружает аватар в директорию $dir
     *
     * @param $file_name
     * @param $file_tmpname
     * @param string $dir
     *
     * @return void
     */
    public function uploadAvatar($file_name, $file_tmpname, $dir = '/img/avatars/')
    {
        $uploadfile = $_SERVER['DOCUMENT_ROOT'] . $dir . basename($file_name);
        move_uploaded_file($file_tmpname, $uploadfile);
    }


    /**
     * Функция добавляет пользователя в БД
     *
     * @param $email
     * @param $username
     * @param $pass
     * @param $first_name
     * @param $last_name
     * @param $birth_date
     * @param $avatar
     *
     * @return void
     */
    public function insertUserDB($email, $username, $pass, $first_name, $last_name, $birth_date, $avatar)
    {
        $sql = "INSERT INTO `table_users` (`id`, `username`, `email`, `pass`, `last_name`, `first_name`, `birth_date`, `avatar`)
                       VALUES (NULL,'{$username}','{$email}','{$pass}','{$last_name}','{$first_name}','{$birth_date}','{$avatar}');";
        $this->db->DBRequest($sql);
    }

    /**
     * Функция проверяет существует ли email
     */
    public function existsEmail()
    {
        $sql = "SELECT id FROM `clients` WHERE email = '{$_POST['email']}'";
        $result = $this->db->DBRequest($sql);
        if ($result->num_rows) {
            echo '1';
        }
    }

    /**
     * Функция проверяет существует ли username
     */
    public function existsLogin()
    {
        $sql = "SELECT id FROM `clients` WHERE login = '{$_POST['login']}'";
        $result = $this->db->DBRequest($sql);
        if ($result->num_rows) {
            echo '1';
        }
    }

    /**
     * Функция регистрирует юзера
     */
    public function registerUser()
    {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $pass = md5($_POST['pass']);
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $birth_date = $_POST['birth_date'];
        $avatar = strtr($_FILES['avatar']['name'], " ", "_");
        $avatar_tmp_name =  strtr($_FILES['avatar']['tmp_name'], " ", "_");

        $this->uploadAvatar($avatar, $avatar_tmp_name);
        $this->insertUserDB($email, $username, $pass, $first_name, $last_name, $birth_date, $avatar);
        $_SESSION['username'] = $_POST['username'];
        echo true;
    }

}