<?php
require('funciones.php');
$db = newPDO();
if(!$db){
    header("Location:init.php");
} else {
    session_start();
}

// /* Base de datos Mysql */
// $dsn = 'mysql:host=127.0.0.1;dbname=;port=8889;charset=UTF8';
// $db_user = 'root';
// $db_pass = 'root';
// $error = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

// try {
//     $db = new PDO($dsn, $db_user, $db_pass, $error);
// }
// catch (PDOException $Exception) {
//     echo $Exception->getMessage();
// }

/* "Base de datos" para Json */
// $jdb = file_get_contents("datos.json");

require('Classes/DB.php');
require('Classes/Mysql.php');
require('Classes/Json.php');
require('Classes/User.php');
require('Classes/Validar.php');