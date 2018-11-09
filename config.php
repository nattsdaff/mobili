<?php
require('funciones.php');
$db = newPDO();
if(!$db){
    header("Location:init.php");
} else {
    session_start();
}

require('Classes/DB.php');
require('Classes/Mysql.php');
require('Classes/Json.php');
require('Classes/User.php');
require('Classes/Validar.php');