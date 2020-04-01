<?php

namespace app\models;

use Model, DB;

class Admin extends Model
{

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    public function login()
    {
        if ($_POST['admin_login'] == admin_login && md5($_POST['admin_password']) == admin_password) {
            $_SESSION['admin'] = admin_login;
            return true;
        }
    }

    public function getClient()
    {
        $sql = "SELECT `id`, `phone`, `login`, `name`, `surname`,`email`, `date_create`, `active`, `club_type` FROM `clients` WHERE `id`={$_GET['id']}";
        $result = $this->db->DBRequest($sql);
        $clients = mysqli_fetch_assoc($result);
        return $clients;
    }

    public function getClients()
    {
        $sql = "SELECT `id`, `phone`, `login`, `name`, `surname`,`email`, `date_create`, `active`, `club_type` FROM `clients`"; // ORDER BY id DESC limit {$lowerLimit} , {$perPageCount}";
        $result = $this->db->DBRequest($sql);
        $clients = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $clients;
    }

}