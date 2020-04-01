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
    public function insertUserDB($email, $login, $password, $surname, $name, $phone, $avatar, $address)
    {
        $sql = "INSERT INTO `clients` (`login`, `email`, `password`, `surname`, `name`, `phone`, `image`, `address`)
                       VALUES ('{$login}','{$email}','{$password}','{$surname}','{$name}','{$phone}','{$avatar}', '{$address}');";
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
     * Функция масштабирования изображения
     *
     * @param string $image - имя файла изображения
     * @param int $w_o - ширина до которой уменьшаем изображение, по умолчанию 900
     * @param int $h_o - высота изображения, по умолчанию вычисляется пропорционально
     *
     * @return void
     */


    public function uploadAvatarAndResize($image, $file_name, $dir = '/img/avatars/', $w_o = 900, $h_o = false)
    {
        list($w_i, $h_i, $type) = getimagesize($image);
        $types = array("", "gif", "jpeg", "png");
        $ext = $types[$type];
        if ($ext) {
            $func = 'imagecreatefrom' . $ext; // Получаем название функции, соответствующую типу, для создания изображения
            $img_i = $func($image); // Создаём дескриптор для работы с исходным изображением
        }

        if (!$h_o) $h_o = $w_o / ($w_i / $h_i);
        if (!$w_o) $w_o = $h_o / ($h_i / $w_i);
        $img_o = imagecreatetruecolor($w_o, $h_o); // Создаём дескриптор для выходного изображения
        imagecopyresampled($img_o, $img_i, 0, 0, 0, 0, $w_o, $h_o, $w_i, $h_i); // Переносим изображение из исходного в выходное, масштабируя его
        $func = 'image' . $ext; // Получаем функция для сохранения результата
        $func($img_o, $_SERVER['DOCUMENT_ROOT'] . $dir . basename($file_name)); // Сохраняем изображение в тот же файл, что и исходное, возвращая результат этой операции
    }

    public function uploadAvatar($file_name, $file_tmpname, $dir = '/img/avatars/')
    {
        $uploadfile = $_SERVER['DOCUMENT_ROOT'] . $dir . basename($file_name);
        move_uploaded_file($file_tmpname, $uploadfile);
    }

    /**
     * Функция регистрирует юзера
     */
    public function registerUser()
    {
        $email = $_POST['email'];
        $login = $_POST['login'];
        $password = md5($_POST['password']);
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $avatar = $_FILES['avatar']['name'];
        $avatar_tmp_name = $_FILES['avatar']['tmp_name'];
        list($w_i, $h_i, $type) = getimagesize($avatar_tmp_name);
        if ($w_i > 900) $this->uploadAvatarAndResize($avatar_tmp_name, $avatar); else $this->uploadAvatar($avatar_tmp_name, $avatar);
        $this->uploadAvatarAndResize($avatar_tmp_name, $avatar, '/img/avatars/avatarsMini/', 100);
        $this->insertUserDB($email, $login, $password, $surname, $name, $phone, $avatar, $address);
        $_SESSION['username'] = $login;
        echo true;
    }

}