<?php

namespace app\models;

use Model, DB;

/**
 * Class Login
 * @package app\models
 */
class Login extends Model
{

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    public function loginUser()
    {
        $login = preg_replace('/\s+/', '', $_POST['enter_login']);
        $password = md5($_POST['enter_password']);
        $sql = "SELECT * FROM `clients` WHERE  login ='{$login}' and password = '{$password}'";
        $result = $this->db->DBRequest($sql);
        if ($result->num_rows) {
            $_SESSION['username'] = $login;
            echo 'true';
        }

    }

    public function getUserData()
    {
        $sql = "SELECT `id`, `login`, `email`, `surname`, `name`, `phone`, `image`, `address` FROM clients WHERE login = '{$_SESSION['username']}'";
        $result = $this->db->DBRequest($sql);
        $profileData = mysqli_fetch_assoc($result);
        return $profileData;
    }

    private function existsLogin()
    {
        $sql = "SELECT id FROM `clients` WHERE login = '{$_POST['login']}'";
        $result = $this->db->DBRequest($sql);
        if ($result->num_rows) {
            return true;
        }
    }

    public function getLogin()
    {
        $sql = "SELECT login FROM `clients` WHERE id = '{$_POST['id']}'";
        $result = $this->db->DBRequest($sql);
        $login = mysqli_fetch_assoc($result);
        echo $login['login'];
    }  

    public function editClientData()
    {
        $prevDataClient = $this->getUserData();
        $newDataClient = $_POST;
        if (!$this->existsLogin()) {
            $sql = "UPDATE `clients` SET login = '{$_POST['login']}' WHERE id = {$_POST['id']}";
            $this->db->DBRequest($sql);
            $_SESSION['username'] = $_POST['login'];
            echo 'true';
        }
    }
}