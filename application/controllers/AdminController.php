<?php

class AdminController extends Controller{

    function __construct() {
        $this->model = new AdminModel();
        $this->view = new View();
    }

    function action_index($id = ''){
        $data = $this->model->get_data();
        $this->view->generate('admin_view.php', 'template_view.php', $data);
    }
}