<?php

$data = $_POST;

$host = 'localhost';
$username = 'root';
$password = '';
$db_name = 'books_library';

$conn = mysqli_connect($host, $username, $password, $db_name);


$title = $data["title"];
$description = $data["description"];
$pages = $data["pages"];
$year = $data["year"];
$imgUrl = '';
$views = 0;
$clicks = 0;

$authors = [$data["author1"], $data["author2"], $data["author3"]];

$sql = "INSERT INTO books (title, description, pages, year, imgURL, views, clicks) VALUES ('$title', '$description', '$pages', '$year', '$imgUrl', '$views', '$clicks')";
$sqlAuthors = "SELECT * FROM authors";
$resultDbAuthors = mysqli_query($conn, $sqlAuthors);
$dbAuthors = mysqli_fetch_all($resultDbAuthors, MYSQLI_ASSOC);
$dbArrAuthors = [];

foreach ($dbAuthors as $dbAuthor) {
    array_push($dbArrAuthors, $dbAuthor["name"]);
}

$resultAuthors = [];

foreach ($authors as $author) {
    if (!in_array($author, $dbArrAuthors) && $author !== '') {
        $resultAuthors[] = $author;
    }
}

function updateImgUrl($bookId) {
    global $conn;
    $imgUrl = "/img/$bookId.jpg";
    $sql2 = "UPDATE books SET imgUrl='$imgUrl' WHERE id=$bookId";
    if (!mysqli_query($conn, $sql2)) {
        $error = mysqli_error($conn);
        header("HTTP/1.0 500 Internal Server Error");
        return "{ 'error': 'Database error: $error' }";
    } else {
        $imagepath="C:/xampp/htdocs/php_projects/books-library/static/img/$bookId.jpg";
        move_uploaded_file($_FILES["photo"]["tmp_name"], $imagepath);
        return "{ 'id': '$bookId' }";
    }
}

function booksConnAuthors($bookId, $authorId) {
    global $conn;
    $sql4 = "INSERT INTO books_connect_author (author_id, book_id) VALUES ('$authorId', '$bookId')";

    if (!mysqli_query($conn, $sql4)) {
        $error = mysqli_error($conn);
        header("HTTP/1.0 500 Internal Server Error");
        echo "{ 'error': 'Database error: $error' }";
    }
}

if (!mysqli_query($conn, $sql)) {
    $error = mysqli_error($conn);
    header("HTTP/1.0 500 Internal Server Error");
    echo "{ 'error': 'Database error: $error' }";
} else {
    $newBookId = mysqli_insert_id($conn);
    foreach ($resultAuthors as $resultAuthor) {
        $sql3 = "INSERT INTO authors (name) VALUES ('$resultAuthor')";
        if (!mysqli_query($conn, $sql3)) {
            $error = mysqli_error($conn);
            header("HTTP/1.0 500 Internal Server Error");
            echo "{ 'error': 'Database error: $error' }";
        } else {
            $newAuthorId = mysqli_insert_id($conn);
            foreach ($authors as $author) {
                if($author !== '') {
                    $sql5 = "SELECT * FROM authors WHERE name='$author'";
                    $resultSql5 = mysqli_fetch_all(mysqli_query($conn, $sql5), MYSQLI_ASSOC);
                    booksConnAuthors($newBookId, $resultSql5[0]["id"]);
                }
            }
        }
    }
    echo updateImgUrl($newBookId);
}
