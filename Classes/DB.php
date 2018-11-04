<?php

<<<<<<< HEAD
abstract class DB 
{
    abstract protected static function guardarUsuario(User $user, $db);
=======
class DB 
{
    public static function guardarUsuario(User $user, $db)
    {
        try {
            $query = $db->prepare('INSERT INTO usuarios(nombre, apellido, email, password, fecha_nac, telefono, dni) VALUES(:nombre, :apellido, :email, :password, :fecha, :tel, :dni)');
            
            $nombre = $user->getNombre();
            $apellido = $user->getApellido();
            $email = $user->getEmail();
            $password = password_hash($user->getPassword(), PASSWORD_DEFAULT);
            $fecha = $user->getFNacAnio().'-'.$user->getFNacMes().'-'.$user->getFNacDia();
            $tel = $user->getTelCod().'-'.$user->getTelefono();
            $dni = $user->getDni();
            
            $query->bindValue(':nombre', $nombre, PDO::PARAM_STR);
            $query->bindValue(':apellido', $apellido, PDO::PARAM_STR);
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->bindValue(':password', $password, PDO::PARAM_STR);
            $query->bindValue(':fecha', $fecha, PDO::PARAM_STR);
            $query->bindValue(':tel', $tel, PDO::PARAM_STR);
            $query->bindValue(':dni', $dni, PDO::PARAM_INT);
            
            $query->execute();
            return true;
        } catch (PDOException $Exception) {
            echo $Exception->getMessage();
        }
    }
>>>>>>> 280c5662dcd810b6207fbf5d71207c779eb53dda
}