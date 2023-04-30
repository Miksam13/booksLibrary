<?php
/*
namespace application\core;

use application\core\View;
use application\core\Model;

abstract class Controller {

    //public $route;
    public $view;
    public $model;

    public function __construct() {
        //$this -> route = $route;
        $this -> view = new View();
        $this -> model = new Model();
    }

    public function loadModel($name) {
        $path = 'application\models\\'.ucfirst($name);

        if (class_exists($path)) {
            return new $path();
        }
    }
}*/

class Controller {

    public $model;
    public $view;

    function __construct(){
        $this->view = new View();
    }

    function action_index($id = ''){
    }
}