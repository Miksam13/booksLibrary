<?php

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

class BookModel extends Model{
    public function get_data($id = ''){
        $db = new \application\lib\Db();

        $all_authors = $db->row("SELECT * FROM authors");
        $book = $db->row("SELECT * FROM books WHERE id=$id");
        $authors = [];
        foreach ($all_authors as $author) {
            foreach (json_decode($author["books_id"]) as $book_id) {
                if ((int)$book_id === (int)$id) {
                    array_push($authors, $author['name']);
                }
            }
        }
        return [
            'book'=>$book,
            'authors'=>$authors
        ];
    }
}