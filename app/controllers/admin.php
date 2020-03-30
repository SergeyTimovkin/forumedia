<?php


namespace app\controllers;

use Controller;

class Admin extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new \app\models\Admin();
    }

    public function index()
    {
        $data = $this->model->getClients();
        $this->view->generate('admin_main_page.php', 'template_page.php', $data);
    }
    public function changeClient()
    {
        $data = $this->model->getClient();
        $this->view->generate('admin_client_page.php', 'template_page.php',$data);
    }


}