<?php
require('config.php');
require('Classes/DB.php');
require('Classes/Mysql.php');
require('Classes/Json.php');
require('Classes/User.php');
require('Classes/Validar.php');

function crearDB($puertoMySQL, $usuarioMySQL, $passwordMySQL)
{
    try 
    {
        /* Attempt MySQL server connection. Assuming you are running MySQL
        server with default setting (user 'root' with no password) */
        $link = mysqli_connect("localhost", $usuarioMySQL, $passwordMySQL);
        
        // Check connection
        if(!$link){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        
        // Attempt create database query execution
        $nombreDBMySQL = 'mobili2';
        $sql = "CREATE DATABASE $nombreDBMySQL";
        if(mysqli_query($link, $sql)){
            echo "Database created successfully";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        // Close connection
        mysqli_close($link);
        // return true;
    }
    catch (PDOException $Exception) 
    {
        echo $Exception->getMessage();
    }

    try 
    {
        /* Attempt MySQL server connection. Assuming you are running MySQL
        server with default setting (user 'root' with no password) */
        $link = mysqli_connect("localhost", "root", "root", $nombreDBMySQL);
        
        // Check connection
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        
        // Attempt create table query execution
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
        if(mysqli_query($link, $sql)){
            echo "Table created successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }

        conectarDB($nombreDBMySQL, $puertoMySQL, $usuarioMySQL, $passwordMySQL);

        // // Close connection
        // mysqli_close($link);
    }
    catch (PDOException $Exception) 
    {
        echo $Exception->getMessage();
    }
}

function conectarDB($nombreDBMySQL, $puertoMySQL, $usuarioMySQL, $passwordMySQL){
    /* Base de datos Mysql */
    $dsn = 'mysql:host=127.0.0.1;dbname='.$nombreDBMySQL.';port='.$puertoMySQL.';charset=UTF8';
    // var_dump($dsn);
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
