<?php

function getMySQLConfig(){
    $json_config = file_get_contents("config.json");
    $guardados = json_decode($json_config, true);
    return $guardados;
    }

function newPDO(){
    $sql_config = getMySQLConfig();
    $db = null;
    if($sql_config){
        $dsn = $sql_config['host'].'dbname='.$sql_config['nombre'].';'.'port='.$sql_config['puerto'].';'.'charset=UTF8';
        $db_user = $sql_config['usuario'];
        $db_pass = $sql_config['password'];
        $error = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        try {
            $db = new PDO($dsn, $db_user, $db_pass, $error);
        }catch (PDOException $Exception) {
            $db = null;
        }
    }
    return $db;
}

function saveMySQLConfig($db_host,$db_port,$db_name,$db_user,$db_pass){
    $json_config = file_get_contents("config.json");
    $guardados = json_decode($json_config, true);
    $datos = array (
        'host' => $db_host,
        'puerto' => $db_port,
        'nombre' => $db_name,
        'usuario' => $db_user,
        'password' => $db_pass,
        'charset' => 'UTF8',
        'error' => '[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]'
        );  
    //SI EXISTEN DATOS, LOS BORRO DEL JSON Y GUARDO LOS NUEVOS.
    if(!$guardados){
        $guardados = $datos;
        $config = json_encode($guardados);
        file_put_contents("config.json",$config);
    }else{
        unset($guardados[0]);
        $guardados = $datos;
        $config = json_encode($guardados);
        file_put_contents("config.json",$config);
        }
    }
  
function initDB($db_port, $db_user, $db_pass)
{
    $db_host = 'mysql:host=localhost;';
    $db_name = 'mobili';
    // ABRO CONEXION CON MYSQL
    try{
        /* Conectar a MySQL */
        $pdo = new PDO($db_host, $db_user, $db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        die("ERROR: Could not connect. " . $e->getMessage());
    }

    // INTENTO CREAR BASE DE DATOS
    try{
        $sql = "CREATE DATABASE IF NOT EXISTS $db_name";
        $pdo->exec($sql);
        saveMySQLConfig($db_host,$db_port,$db_name,$db_user,$db_pass);
    }catch(PDOException $e){
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }

    // INTENTO CREAR TABLA USUARIOS
    try{
        $sql = "USE $db_name";
        $pdo->exec($sql);
        $sql = "CREATE TABLE usuarios (
            id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
            nombre VARCHAR(50) NOT NULL,
            apellido VARCHAR(50) NOT NULL,
            email VARCHAR(80) NOT NULL UNIQUE,
            password VARCHAR(100) NOT NULL,
            fecha_nac DATETIME NOT NULL,
            telefono VARCHAR(20) DEFAULT NULL,
            dni INT(10) UNSIGNED UNIQUE DEFAULT NULL,
            avatar VARCHAR(100) DEFAULT NULL
        )";
        $pdo->exec($sql);
        // echo "Table created successfully.";
        // CERRAR CONEXION
        unset($pdo);
        return true;
    }catch(PDOException $e){
        die("ERROR: Could not connect. " . $e->getMessage());
    }
    
}

function migrateJsonAMySQL($db_user, $db_pass)
{
    $jdb = file_get_contents("datos.json");
    $usuariosGuardados = json_decode($jdb, true);

    for ($i=0; $i < count($usuariosGuardados['usuarios']); $i++) {

        $nombre = $usuariosGuardados['usuarios'][$i]['nombre'];
        $apellido = $usuariosGuardados['usuarios'][$i]['apellido'];
        $email = $usuariosGuardados['usuarios'][$i]['email'];
        $password = $usuariosGuardados['usuarios'][$i]['password'];
        $fecha = $usuariosGuardados['usuarios'][$i]['fnacanio'].'-'.$usuariosGuardados['usuarios'][$i]['fnacmes'].'-'.$usuariosGuardados['usuarios'][$i]['fnacdia'];
        $tel = (empty($usuariosGuardados['usuarios'][$i]['telefono'].$usuariosGuardados['usuarios'][$i]['telefono'])) ? NULL : $usuariosGuardados['usuarios'][$i]['telefono'];
        $dni = (empty($usuariosGuardados['usuarios'][$i]['dni'])) ? NULL : $usuariosGuardados['usuarios'][$i]['dni'];

        try {
            $guardados = getMySQLConfig();
            $pdo = newPDO();
            $query = $pdo->prepare('INSERT INTO usuarios(nombre, apellido, email, password, fecha_nac, telefono, dni) VALUES(:nombre, :apellido, :email, :password, :fecha, :tel, :dni)');
            $query->bindValue(':nombre', $nombre, PDO::PARAM_STR);
            $query->bindValue(':apellido', $apellido, PDO::PARAM_STR);
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->bindValue(':password', $password, PDO::PARAM_STR);
            $query->bindValue(':fecha', $fecha, PDO::PARAM_STR);
            $query->bindValue(':tel', $tel, PDO::PARAM_STR);
            $query->bindValue(':dni', $dni, PDO::PARAM_INT);
            
            $query->execute();
            // setcookie("cookie_newUser", 1, time()+(17));
        }
        catch (PDOException $Exception){
            echo $Exception->getMessage();
        }

    }
}
