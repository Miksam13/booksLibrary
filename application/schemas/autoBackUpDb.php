<?php

$host = 'localhost';
$username = 'root';
$password = '';
$db_name = 'books_library';

date_default_timezone_set("Europe/Kiev");

if(!file_exists("C:/Users/maks1/Documents/Databases")) {
    mkdir("C:/Users/maks1/Documents/Databases");
}

if(!file_exists(("C:/Users/maks1/Documents/Databases/$db_name"))) {
    mkdir("C:/Users/maks1/Documents/Databases/$db_name");
}

$filename = $db_name."_".date("F_d_Y")."@".date("g_ia").uniqid("_", false);
$folder = "C:/Users/maks1/Documents/Databases/$db_name/".$filename.".sql";

exec("C:/xampp/mysql/bin/mysqldump --user={$username} --password={$password} --host={$host} {$db_name} --result-file={$folder}", $output);

print_r($output);