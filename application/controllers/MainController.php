<?php
/*
namespace application\controllers;

use application\core\Controller;
use application\lib\Db;
use application\core\View;
use application\models\Main;

class MainController extends Controller {

    public function __construct() {
        $this->model = new Main();
        $this->view = new View();

    }

    public function indexAction() {

        $db = new Db;

        $params = [
            'id' => 2,
        ];

        $data = $db->column('SELECT username FROM users WHERE id = :id', $params);


        $result = $this->model->getData();
        //$this->view->render('mainView.php', $vars);

        $this->view->generate('mainView.php', 'headerView.php', 'footerView.php', $data);
    }

}*/

class MainController extends Controller {

    function __construct() {
        $this->model = new MainModel();
        $this->view = new View();
    }

    function action_index($id = ''){
        /*$data = $this->model->get_data();

        $db = new Db;

        $data = $db->row('SELECT * FROM books');

*/
        $data = $this->model->get_data();
        $this->view->generate('main_view.php', 'template_view.php', $data);
    }
}