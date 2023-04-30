<?php

class BookController extends Controller{

    function __construct() {
        $this->model = new BookModel();
        $this->view = new View();
    }

    function action_index($id = ''){
        $data = $this->model->get_data($id);
        $this->view->generate('book_view.php', 'template_view.php', $data);
    }
}