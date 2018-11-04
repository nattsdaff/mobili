<?php
class Json
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
        $user->setPassword(password_hash($user->getPassword(),PASSWORD_DEFAULT));
        $datos = User::convert($user);
        
        $usuariosGuardados["usuarios"][]=$datos;
        
        $usuarioJson = json_encode($usuariosGuardados);
        
        file_put_contents("datos.json",$usuarioJson);
        
        setcookie("cookie_newUser", 1, time()+(17));
    }
}