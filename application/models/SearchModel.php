<?php

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

class SearchModel extends Model{
    public function get_data($id = ''){
        $db = new \application\lib\Db();

        $str = $_SERVER['REQUEST_URI'];
        $search = "books?search=";
        $pos = strpos($str, $search);

        $search_text = urldecode(substr($str, $pos + strlen($search)));

        $authors = $db->row("SELECT * FROM authors");
        $books = $db->row("SELECT * FROM books WHERE title LIKE '%${search_text}%'");
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