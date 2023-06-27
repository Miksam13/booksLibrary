<?php

class Route {
    static function start() {
        // контроллер и действие по умолчанию
        $controller_name = 'Main';
        $action_name = 'index';

        $routes = explode('/books-library/', $_SERVER['REQUEST_URI']);

        // получаем имя контроллера
        if (!empty($routes[1])) {
            if($routes[1] === 'admin') {
                $controller_name = 'Admin';
            } else if (strpos($routes[1], "admin?table_page=") !== false) {
                $controller_name = 'Admin';
            } else {
                $str = $routes[1];
                $search = "books?search=";
                $pos = strpos($str, $search);

                if ($pos !== false) {
                    $controller_name = 'Search';
                } else {
                    preg_match('/book\/(\d+)/', $routes[1], $matches);
                    $id = isset($matches[1]) ? $matches[1] : null;
                    $controller_name = 'Book';
                }
            }
        }

        // добавляем префиксы
        $model_name = $controller_name.'Model';
        $controller_name = $controller_name.'Controller';
        $action_name = 'action_'.$action_name;

        // подцепляем файл с классом модели (файла модели может и не быть)

        $model_file = strtolower($model_name).'.php';
        $model_path = "application/models/".$model_file;
        if(file_exists($model_path)) {
            include "application/models/".$model_file;
        }

        // подцепляем файл с классом контроллера
        $controller_file = strtolower($controller_name).'.php';
        $controller_path = "application/controllers/".$controller_file;
        if(file_exists($controller_path)) {
            include "application/controllers/".$controller_file;
        } else {
            /*
            правильно было бы кинуть здесь исключение,
            но для упрощения сразу сделаем редирект на страницу 404
            */
            //(new Route)->ErrorPage404();
        }

        // создаем контроллер
        $controller = new $controller_name;
        $action = $action_name;

        if (isset($id)) {
            // вызываем действие контроллера с аргументом $id
            $controller->$action($id);
        } else if (method_exists($controller, $action)) {
            // вызываем действие контроллера
            $controller->$action();
        } else {
            // здесь также разумнее было бы кинуть исключение
            //(new Route)->ErrorPage404();
        }

    }

    function ErrorPage404() {
        $host = 'http://localhost/php_projects/books-library/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }
}