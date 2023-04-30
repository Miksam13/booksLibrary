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

        $all_authors = $db->row("SELECT * FROM authors");
        $books = $db->row("SELECT * FROM books");
        $authors = [];
        $data = [];
        foreach ($books as $book) {
            foreach ($all_authors as $author) {
                foreach (json_decode($author["books_id"]) as $book_id) {
                    if ((int)$book_id === (int)$book['id']) {
                        array_push($authors, $author['name']);
                    }
                }
            }
            $book['authors'] = $authors;
            $authors = [];
            array_push($data, $book);
        }
        return $data;
    }
}