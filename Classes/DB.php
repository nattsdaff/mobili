<?php

class JSONDB
{
    public static function connector()
    {
       return file_get_contents("datos.json");
    }

    public function guardarUsuario($usuario)
    {
        $archivo= file_get_contents("datos.json");
        $guardados=json_decode($archivo,true);

        $hash = password_hash($usuario->getPassword(),PASSWORD_DEFAULT);

        $ultimoID=(count($guardados["usuarios"]));

        $target_dir = "assets/uploads/usuarios/$ultimoID/";
        if (!is_dir($target_dir)) {

            mkdir($target_dir, 0777, true);
            $guardados["usuarios"][] = $usuario;

        }

        $usuarioJson = json_encode($guardados);
        file_put_contents("datos.json",$usuarioJson);
    }
}