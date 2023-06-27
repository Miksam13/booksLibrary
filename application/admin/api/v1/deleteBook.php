<?php

$bookId = $_GET['bookId'];

$host = 'localhost';
$username = 'root';
$password = '';
$db_name = 'books_library';

$conn = mysqli_connect($host, $username, $password, $db_name);

$sql = "UPDATE books SET deleted=now() WHERE id=$bookId";

if (!mysqli_query($conn, $sql)) {
    $error = mysqli_error($conn);
    header("HTTP/1.0 500 Internal Server Error");
    echo "{ 'error': 'Database error: $error' }";
} else {
    mysqli_query($conn, $sql);
    echo "{ 'ok' : true }";
}
