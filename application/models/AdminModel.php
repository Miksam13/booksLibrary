<?php

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

class AdminModel extends Model{
    public function get_data($id = ''){
        $db = new \application\lib\Db();

        if($_SERVER["REQUEST_URI"] !== '/books-library/admin') {
            $page = $_GET["table_page"];
        } else {
            $page = 1;
        }

        $from = (($page-1)*4);

        $authors = $db->row("SELECT * FROM authors");
        $table_books = $db->row("SELECT * FROM books WHERE deleted IS NULL LIMIT $from,4");
        $books = $db->row("SELECT * FROM books WHERE deleted IS NULL");
        $connects = $db->row("SELECT * FROM books_connect_author");
        $data = [];
        $table_data = [];
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
        foreach ($table_books as $book) {
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
            array_push($table_data, $book);
        }
        return [
            'books'=>$data,
            'table_books'=>$table_data
        ];
    }
}