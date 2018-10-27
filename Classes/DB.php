<?php

class DB
{
    public static function conectorJson()
    {
       return file_get_contents("datos.json");
    }

    public function guardarUsuarioJson($user)
    {
        // ABRIR ARCHIVO
        $archivoJson = file_get_contents("datos.json");
        // CONVERTIR EL ARCHIVO EN ARRAY  
        $usuariosGuardados = json_decode($archivoJson,true);
        // ENCRIPTAR CONTRASEÑA
        $hash = password_hash($user->getPassword(),PASSWORD_DEFAULT);

        $usuariosGuardados["usuarios"][]=$_POST;
        
        $usuarioJson = json_encode($usuariosGuardados);

        file_put_contents("datos.json",$usuarioJson);
    }
}