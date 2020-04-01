<?php


namespace app\controllers;

use Controller;

class Admin extends Controller
{

    public $folderViews = 'admin/';

    public function __construct()
    {

        parent::__construct();
        $this->model = new \app\models\Admin();

    }

    public function index()
    {
        if (!$_SESSION['admin']) $this->view->generate($this->folderViews . 'admin_login_page.php', $this->folderViews . 'template_admin_page.php');
        else  $this->getClients();
    }

    public function login()
    {
        if($this->model->login()) header('Location: ' . SITE_ROOT . 'admin/getClients');;
    }

    public function getClients()
    {
        $data = $this->model->getClients();
        $this->view->generate($this->folderViews . 'admin_clients_page.php', $this->folderViews . 'template_admin_page.php', $data);
    }

    public function changeClient()
    {
        $data = $this->model->getClient();
        $this->view->generate($this->folderViews . 'admin_client_page.php', $this->folderViews . 'template_admin_page.php', $data);
    }

    public function logout()
    {
        unset($_SESSION['admin']);
        session_destroy();
        header('Location: ' . SITE_ROOT . "home");
        exit;
    }


}