<?php
/*
namespace application\models;

use application\core\Model;

class Main extends Model {
    public function getNews() {
        $result =  $this->db->row('SELECT title, description FROM news');
        return $result;
    }
}*/

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
class MainModel extends Model{
    public function get_data($id = ''){
        $db = new \application\lib\Db();

        $authors = $db->row("SELECT * FROM authors");
        $books = $db->row("SELECT * FROM books");
        $connects = $db->row("SELECT * FROM books_connect_author");
        $data = [];
        foreach ($books as $book) {
            $book["authors"] = [];
            foreach ($connects as $connect) {
                if ($connect["book_id"] === $book["id"]) {
                    foreach ($authors as $author) {
                        if($author["id"] === $connect["author_id"]) {
                            array_push($book["authors"], $author["name"]);
                        }
                    }
                }
            }
            array_push($data, $book);
        }
        return $data;
    }
}