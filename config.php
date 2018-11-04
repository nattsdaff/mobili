<?php

$dsn = 'mysql:host=127.0.0.1;dbname=mobili;port=3306;charset=UTF8';
$db_user = 'root';
$db_pass = 'root';
$error = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {
    $db = new PDO($dsn, $db_user, $db_pass, $error);
}
catch (PDOException $Exception) {
    echo $Exception->getMessage();
}

session_start();