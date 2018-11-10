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
        $errores["nombre"]="Nombre debe ser mayor a 2 letras";
        } elseif (!preg_match("/^[a-zA-Z áéíóúÁÉÍÓÚñÑüÜ]*$/", ($user->getNombre()))) {
          $errores["nombre"]="Sólo se permiten letras y espacios en blanco";
        } else {
          $nombreSinEspacios = trim($user->getNombre());
          $user->setNombre($nombreSinEspacios);
        }

        if (strlen($user->getApellido())<2) {
        $errores["apellido"]="Apellido debe ser mayor a 2 letras";
        } elseif (!preg_match("/^[a-zA-Z áéíóúÁÉÍÓÚñÑüÜ]*$/", ($user->getApellido()))) {
          $errores["apellido"]="Sólo se permiten letras y espacios en blanco";
        } else {
          $apellidoSinEspacios = trim($user->getApellido());
          $user->setApellido($apellidoSinEspacios);
        }

        //si es true significa que ya existe el usuario y que no esta disponible
        if (self::validarSiExiste($user->getEmail(), $db)) {
            //Con self::<nombredemetodo> accedemos a metodos estaticos dentro de la misma
            $errores["email"] ="Email ya existente";

        }

        if (strlen($user->getPassword())<6) {
            $errores["password"]="Contraseña demasiado corta";
        }
        if (!self::passwordConfirm($user, $data)) {
            $errores["passwordConfirm"]="No concuerdan las contraseñas";
        }

        if (!filter_var($user->getEmail(), FILTER_VALIDATE_EMAIL)) {
            $errores["email"]="Formato de email inválido.";
        }

        if ((date("Y")-($user->getFNacAnio()))<18) {
            $errores["edad"]="Debe ser mayor de 18 años";
        }

        if ($user->getTelCod() !== "" && (!is_numeric($user->getTelCod()))){
          $errores["telcod"]="Código de área inválido";
        } elseif (strpos($user->getTelCod(), ".")) {
            $errores["telcod"]="Debe ingresar sólo números";
        } elseif ($user->getTelCod() !== "" && ((($user->getTelCod())<11) || (($user->getTelCod())>3894) || ((strlen($user->getTelCod()))<2) || ((strlen($user->getTelCod()))>5))) {
          $errores["telcod"]="Código de área inválido";
        }

        if ($user->getTelefono() !== "" && (!is_numeric($user->getTelefono()))) {
            $errores["telefono"]="Teléfono inválido";
        } elseif (strpos($user->getTelefono(), ".")) {
            $errores["telefono"]="Debe ingresar sólo números";
        } elseif ($user->getTelefono() !== "" && ((strlen($user->getTelefono()))<6) || ((strlen($user->getTelefono()))>8)) {
            $errores["telefono"]="Teléfono debe ser mayor a 7 dígitos";
        }

        if (($user->getTelCod()=="") && (($user->getTelefono()!==""))) {
          $errores["telcod"]="Debe completar el código de área";
        }

        if (($user->getTelCod()!=="") && (($user->getTelefono()==""))) {
          $errores["telefono"]="Debe completar el teléfono";
        }

        if ($user->getDni() !== "" && (!is_numeric($user->getDni()))) {
            $errores["dni"]="DNI inválido";
        } elseif (strpos($user->getDni(), ".")) {
            $errores["dni"]="Debe ingresar sólo números";
        } elseif ($user->getDni() !== "" && (($user->getDni())<2000000) || (($user->getDni())>120000000)) {
            $errores["dni"]="DNI inválido";
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
