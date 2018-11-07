<?php
require('config.php');
require('Classes/DB.php');
require('Classes/Mysql.php');
require('Classes/Json.php');
require('Classes/User.php');
require('Classes/Validar.php');

function crearDB($puertoMySQL, $usuarioMySQL, $passwordMySQL)
{
    /* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
    try{
        $pdo = new PDO("mysql:host=localhost;", $usuarioMySQL, $passwordMySQL);
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch(PDOException $e){
        die("ERROR: Could not connect. " . $e->getMessage());
    }

    // Attempt create database query execution
    try{
        $nombreDBMySQL = 'mobili1';
        $sql = "CREATE DATABASE $nombreDBMySQL";
        $pdo->exec($sql);
        echo "Database created successfully";
    } 
    catch(PDOException $e){
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }

    /* 
    /* CREAR TABLA USUARIOS EN DB
    /* 
    /* INTENTO DE CONECTAR CON MySQL */
    try{
        $pdo = new PDO("mysql:host=localhost;dbname="."$nombreDBMySQL", $usuarioMySQL, $passwordMySQL);
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch(PDOException $e){
        die("ERROR: Could not connect. " . $e->getMessage());
    }

    // INTENTO DE CREAR TABLA
    try{
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
    } catch(PDOException $e){
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }

    // CERRAR CONEXION
    // unset($pdo);

    conectarDB($nombreDBMySQL, $puertoMySQL, $usuarioMySQL, $passwordMySQL);

}

function conectarDB($nombreDBMySQL, $puertoMySQL, $usuarioMySQL, $passwordMySQL){
    /* Base de datos Mysql */
    $dsn = 'mysql:host=127.0.0.1;dbname='.$nombreDBMySQL.';port='.$puertoMySQL.';charset=UTF8';
     var_dump($dsn);
    $db_user = 'root';
    $db_pass = 'root';
    $error = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

    try {
        $db = new PDO($dsn, $db_user, $db_pass, $error);
    }
    catch (PDOException $Exception) {
        echo $Exception->getMessage();
    }
}

function migrarJsonAMySQL($db, $usuarioMySQL, $passwordMySQL)
{
        $archivoJson = file_get_contents("datos.json");
        $usuariosGuardados = json_decode($archivoJson, true);
        
        for ($i=0; $i < count($usuariosGuardados['usuarios']); $i++) {

            $nombre = $usuariosGuardados['usuarios'][$i]['nombre'];
            $apellido = $usuariosGuardados['usuarios'][$i]['apellido'];
            $email = $usuariosGuardados['usuarios'][$i]['email'];
            $password = $usuariosGuardados['usuarios'][$i]['password'];
            $fecha = $usuariosGuardados['usuarios'][$i]['fnacanio'].'-'.$usuariosGuardados['usuarios'][$i]['fnacmes'].'-'.$usuariosGuardados['usuarios'][$i]['fnacdia'];
            $tel = (empty($usuariosGuardados['usuarios'][$i]['telefono'].$usuariosGuardados['usuarios'][$i]['telefono'])) ? NULL : $usuariosGuardados['usuarios'][$i]['telefono'];
            $dni = (empty($usuariosGuardados['usuarios'][$i]['dni'])) ? NULL : $usuariosGuardados['usuarios'][$i]['dni'];

            try 
            {
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
                    
            catch (PDOException $Exception) 
            {
                echo $Exception->getMessage();
            }
        }
    }
