<?php

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

class BookModel extends Model{
    public function get_data($id = ''){
        $db = new \application\lib\Db();

        $authors = $db->row("SELECT * FROM authors");
        $book = $db->row("SELECT * FROM books WHERE id=$id");
        $connects = $db->row("SELECT * FROM books_connect_author");
        $book_authors = [];
        foreach ($connects as $connect) {
            if($connect["book_id"] === (int)$id) {
                foreach ($authors as $author) {
                    if($author["id"] === $connect["author_id"]) {
                        array_push($book_authors, $author["name"]);
                    }
                }
            }
        }
        return [
            'book'=>$book,
            'authors'=>$book_authors
        ];
    }
}