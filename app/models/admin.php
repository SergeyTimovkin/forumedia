<?php


namespace app\models;

use Model, DB;

class Admin extends Model
{
    /**
     * @var $count_clients - количество зарегистрированных клиентов
     */
    //  public $count_clients;

    public function __construct()
    {
        $this->db = DB::getInstance();
        //    $this->count_clients = $this->getCountClients();
    }

    /**
     * Функция возвращает количество зарегистрированных клиентов
     *
     * @return $count_clients
     */
//    public function getCountClients()
//    {
//        $sql = "SELECT COUNT(*) FROM clients";
//        $result = $this->db->DBRequest($sql);
//        $count_clients = mysqli_fetch_row($result)[0];
//        return $count_clients;
//    }

    public function getClient()
    {

        $sql = "SELECT `id`, `phone`, `login`, `name`, `surname`,`email`, `date_create`, `active`, `club_type` FROM `clients` WHERE `id`={$_GET['id']}";
        $result = $this->db->DBRequest($sql);
        $clients = mysqli_fetch_assoc($result);
        return $clients;
    }

    public function getClients()
    {
        //номер первой страницы, по умолчанию = 1
//        $pageNumber = isset($_GET['pageNumber']) ? $_GET['pageNumber'] : 1;
//
//        $perPageCount = numberRowForPagination;
//        $rowCount = $this->count_clients;
//        $pagesCount = ceil($rowCount / $perPageCount);
//        $lowerLimit = ($pageNumber - 1) * $perPageCount;
        $sql = "SELECT `id`, `phone`, `login`, `name`, `surname`,`email`, `date_create`, `active`, `club_type` FROM `clients`"; // ORDER BY id DESC limit {$lowerLimit} , {$perPageCount}";
        $result = $this->db->DBRequest($sql);
        $clients = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $clients;
    }

}