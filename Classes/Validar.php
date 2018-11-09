<?php

class Validar
{
    public static function validarSiExiste($email, $db)
    {   
        try {
            $query = $db->prepare('SELECT * FROM usuarios WHERE email=:email');
            
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            
            $query->execute();
            $resultado = $query->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        } 
        catch (PDOException $Exception) {
            echo $Exception->getMessage();
        }
    }
    
    private static function passwordConfirm(User $user, $data)
    {
        $password1 = $user->getPassword();
        $password2 = $data['passwordConfirm'];
        
        return $password1 == $password2;
    }
    public static function validacionRegistro($user, $data, $db)
    {
        
        $errores=[];

        if (strlen($user->getNombre())<2) {
        $errores["nombre"]="Nombre no valido";
        }
        if (strlen($user->getApellido())<2) {
        $errores["apellido"]="Apellido no valido";
        }

        //si es true significa que ya existe el usuario y que no esta disponible
        if (self::validarSiExiste($user->getEmail(), $db)) {
            //Con self::<nombredemetodo> accedemos a metodos estaticos dentro de la misma
            $errores["email"] ="ya existe este usuario o mail";

        }

        if (strlen($user->getPassword())<6) {
            $errores["contrasena"]="Contraseña demasiado cortasss";
        }
        if (!self::passwordConfirm($user, $data)) {
            $errores["passwordConfirm"]="No concuerdan las contraseñas";
        }
        if (!filter_var($user->getEmail(), FILTER_VALIDATE_EMAIL)) {
            $errores["email"]="no ingreso un email valido";
        }
        return $errores;
    }
    
    public static function logearUsuario($datosLogin, $db)
    {
        /*$guardados = getMySQLConfig(); //funciones.php line 10
        $db = newPDO(); //funciones.php line 16*/
        
        $resultado = Mysql::buscarUsuario($datosLogin, $db);
        $error="Datos inválidos";
        if ( $resultado && password_verify($datosLogin["password"], $resultado["password"]) ) {
            $error=null;
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            if($_COOKIE["cookie_newUser"]==1){
                setcookie('cookie_newUser', null, -1);
            }

            $_SESSION["email"] = $resultado["email"];
            $_SESSION["nombre"] = $resultado["nombre"];
            $_SESSION["apellido"] = $resultado["apellido"];
            $_SESSION["avatar"] = $resultado["avatar"];

            if(!empty($datosLogin["recordar"])){
                setcookie("cookie_recordar", true, time() + (86400 * 30));
                setcookie("cookie_email", $_SESSION["email"], time() + (86400 * 30));
                setcookie("cookie_nombre", $_SESSION["nombre"], time() + (86400 * 30));
                setcookie("cookie_apellido", $_SESSION["apellido"], time() + (86400 * 30));
                setcookie("cookie_avatar", $_SESSION["avatar"], time() + (86400 * 30));
            }
        }
        return $error;
    }    
}

    /* LOGEAR A TRAVES DE JSON */
    /*$archivo = $db->conectorJson();
    $datos = json_decode($archivo, true);
    for ($i=0; $i<count($datos["usuarios"]); $i++) {
        if ($datos["usuarios"][$i]["email"]==$datosLogin["correo"]) {
            if (password_verify($datosLogin["password"],$datos["usuarios"][$i]["password"])) {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }

                if($_COOKIE["cookie_newUser"]==1){
                    setcookie('cookie_newUser', null, -1);
                }

                $_SESSION["email"] = $datos["usuarios"][$i]["email"];
                $_SESSION["nombre"] = $datos["usuarios"][$i]["nombre"];
                $_SESSION["avatar"] = $datos["usuarios"][$i]["avatar"];

                if(!empty($datosLogin["recordar"])){
                    setcookie("cookie_recordar", true, time() + (86400 * 30));
                    setcookie("cookie_email", $_SESSION["email"], time() + (86400 * 30));
                    setcookie("cookie_nombre", $_SESSION["nombre"], time() + (86400 * 30));
                    setcookie("cookie_avatar", $_SESSION["avatar"], time() + (86400 * 30));
                }

                header("Location:mi-cuenta.php");
            }
        }
    }
    return "Datos inválidos.";*/
