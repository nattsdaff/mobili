<?php
require('config.php');
require('Classes/DB.php');
require('Classes/Mysql.php');
require('Classes/Json.php');
require('Classes/User.php');
require('Classes/Validar.php');

function initDB($puertoMySQL, $usuarioMySQL, $passwordMySQL)
{
    $nombreDBMySQL = 'mobili1';
    // ABRO CONEXION CON MYSQL
    try{
        /* Conectar a MySQL */
        $pdo = new PDO("mysql:host=localhost;", $usuarioMySQL, $passwordMySQL);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        die("ERROR: Could not connect. " . $e->getMessage());
    }

    // INTENTO CREAR BASE DE DATOS
    try{
        $sql = "CREATE DATABASE IF NOT EXISTS $nombreDBMySQL";
        $pdo->exec($sql);
        echo "Database created successfully";
    }catch(PDOException $e){
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }

    // INTENTO CREAR TABLA USUARIOS
    try{
        $sql = "USE $nombreDBMySQL";
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
        echo "Table created successfully.";
    }catch(PDOException $e){
        die("ERROR: Could not connect. " . $e->getMessage());
    }
    return $pdo;
    //CERRAR CONEXION
    // unset($pdo);
}

function migrarJsonAMySQL($db, $usuarioMySQL, $passwordMySQL)
{
    $usuariosGuardados = json_decode($db, true);
    
    for ($i=0; $i < count($usuariosGuardados['usuarios']); $i++) {

        $nombre = $usuariosGuardados['usuarios'][$i]['nombre'];
        $apellido = $usuariosGuardados['usuarios'][$i]['apellido'];
        $email = $usuariosGuardados['usuarios'][$i]['email'];
        $password = $usuariosGuardados['usuarios'][$i]['password'];
        $fecha = $usuariosGuardados['usuarios'][$i]['fnacanio'].'-'.$usuariosGuardados['usuarios'][$i]['fnacmes'].'-'.$usuariosGuardados['usuarios'][$i]['fnacdia'];
        $tel = (empty($usuariosGuardados['usuarios'][$i]['telefono'].$usuariosGuardados['usuarios'][$i]['telefono'])) ? NULL : $usuariosGuardados['usuarios'][$i]['telefono'];
        $dni = (empty($usuariosGuardados['usuarios'][$i]['dni'])) ? NULL : $usuariosGuardados['usuarios'][$i]['dni'];

        try {
            $query = $db->prepare('INSERT INTO usuarios2(nombre, apellido, email, password, fecha_nac, telefono, dni) VALUES(:nombre, :apellido, :email, :password, :fecha, :tel, :dni)');
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
