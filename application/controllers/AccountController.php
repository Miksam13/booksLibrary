<?php

namespace application\controllers;
use application\core\Controller;

class AccountController extends Controller {
    /*public function __construct() {

    }*/

    public function loginAction() {
        $this->view->redirect('/');
        $this->view->render('Login');
    }

    public function registerAction() {
        $this->view->render('Registration');
    }
}