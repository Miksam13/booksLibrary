<?php

$bookId = $_GET['bookId'];

$host = 'localhost';
$username = 'root';
$password = '';
$db_name = 'books_library';

$conn = mysqli_connect($host, $username, $password, $db_name);

$sqlBook = "SELECT * FROM books WHERE id=$bookId";
$resultBook = mysqli_query($conn, $sqlBook);
$book = mysqli_fetch_all($resultBook, MYSQLI_ASSOC);

$clicks = $book[0]["clicks"]+1;

$sql = "UPDATE books SET clicks='$clicks' WHERE id=$bookId";

if (!mysqli_query($conn, $sql)) {
    $error = mysqli_error($conn);
    header("HTTP/1.0 500 Internal Server Error");
    echo "{ 'error': 'Database error: $error' }";
} else {
    mysqli_query($conn, $sql);
    echo "{ 'ok' : true }";
}
