<?php

class Mysql extends DB
{   
    public static function guardarUsuario(User $user, $db)
    {
        try {
            
            $guardados = getMySQLConfig(); //funciones.php line 10
            $db = newPDO(); //funciones.php line 16

            $query = $db->prepare('INSERT INTO usuarios(nombre, apellido, email, password, fecha_nac, telefono, dni) VALUES(:nombre, :apellido, :email, :password, :fecha, :tel, :dni)');
            
            $nombre = (empty($user->getNombre())) ? NULL : $user->getNombre();
            $apellido = (empty($user->getApellido())) ? NULL : $user->getApellido();
            $email = (empty($user->getEmail())) ? NULL : $user->getEmail();
            $password = password_hash($user->getPassword(), PASSWORD_DEFAULT);
            $fecha = $user->getFNacAnio().'-'.$user->getFNacMes().'-'.$user->getFNacDia();
            $telefono = $user->getTelCod().'-'.$user->getTelefono();
            $tel = ($telefono == '-') ? NULL : $telefono;
            $dni = (empty($user->getDni())) ? NULL : $user->getDni();
            
            $query->bindValue(':nombre', $nombre, PDO::PARAM_STR);
            $query->bindValue(':apellido', $apellido, PDO::PARAM_STR);
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->bindValue(':password', $password, PDO::PARAM_STR);
            $query->bindValue(':fecha', $fecha, PDO::PARAM_STR);
            $query->bindValue(':tel', $tel, PDO::PARAM_STR);
            $query->bindValue(':dni', $dni, PDO::PARAM_INT);
            
            $query->execute();
            setcookie("cookie_newUser", 1, time()+(17));
            return true;
        } 
        catch (PDOException $Exception) {
            echo $Exception->getMessage();
        }
    }
    public static function buscarUsuario($datosLogin, $db)
    {
        try {
            $query = $db->prepare('SELECT * FROM usuarios WHERE email=:email');
            
            $email = $datosLogin["correo"];
            
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            
            $query->execute();
            $resultado = $query->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        } 
        catch (PDOException $Exception) {
            echo $Exception->getMessage();
        }
    }
}