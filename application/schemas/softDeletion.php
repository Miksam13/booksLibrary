<?php

$host = 'localhost';
$username = 'root';
$password = '';
$db_name = 'books_library';

$conn = mysqli_connect($host, $username, $password, $db_name);

$sqlIds = "SELECT id FROM books WHERE deleted<now()";
$resultIds = mysqli_query($conn, $sqlIds);
$ids = mysqli_fetch_all($resultIds, MYSQLI_ASSOC);

foreach ($ids as $id) {
    $sqlAuthors = "SELECT author_id FROM books_connect_author WHERE book_id={$id['id']}";
    $resultAuthors = mysqli_query($conn, $sqlAuthors);
    $authors = mysqli_fetch_all($resultAuthors, MYSQLI_ASSOC);
    $sql1 = "DELETE FROM books_connect_author WHERE book_id={$id['id']}";

    if (!mysqli_query($conn, $sql1)) {
        $error = mysqli_error($conn);
        header("HTTP/1.0 500 Internal Server Error");
        echo "{ 'error': 'Database error: $error' }";
    } else {
        mysqli_query($conn, $sql1);
    }
    $sql = "DELETE FROM books WHERE id={$id['id']}";

    if (!mysqli_query($conn, $sql)) {
        $error = mysqli_error($conn);
        header("HTTP/1.0 500 Internal Server Error");
        echo "{ 'error': 'Database error: $error' }";
    } else {
        mysqli_query($conn, $sql);
        echo "{ 'ok' : true }";
    }

    if(file_exists('C:/xampp/htdocs/php_projects/books-library/static/img/' . $id['id'] . '.jpg')) {
        unlink('C:/xampp/htdocs/php_projects/books-library/static/img/' . $id['id'] . '.jpg');
    }
}