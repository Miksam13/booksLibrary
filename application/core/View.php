<?php
/*
namespace application\core;

class View {

    public $path;
    public $route;
    public $layout = 'default';

    public function __construct($route) {
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
    }

    public function render($title, $vars = []) {
        extract($vars);
        if (file_exists('application/views/'.$this->path.'.php')) {
            require 'application/views/'.$this->path.'.php';
            $content = ob_get_clean();
            require 'application/views/'.$this->path.'.php';
        }
        else {
            echo 'Вид не найден: '. $this->path;
        }
    }

    public function generate($content_view, $headerView, $footerView, $data = []) {
        include 'application/view/' . $headerView;
        include 'application/view/' . $footerView;

    }

    public static function errorCode($code) {
        http_response_code($code);
        require 'application/views/errors/'.$code.'.php';
        exit;
    }

    public function redirect($url) {
        header('location: '.$url);
        exit;
    }
}*/

class View
{
    //public $template_view; // здесь можно указать общий вид по умолчанию.

    function generate($content_view, $template_view, $data = []){
        /*
        if(is_array($data)) {
            // преобразуем элементы массива в переменные
            extract($data);
        }
        */

        include 'application/views/'.$template_view;
    }
}