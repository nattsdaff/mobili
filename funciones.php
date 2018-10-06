<?php
  function validacionRegistro($datos){
    $errores=[];
    // EMAIL
    if (!filter_var($datos["email"], FILTER_VALIDATE_EMAIL)){
      $errores["email"] = "Por favor ingrese un e-mail válido";
    }
    // NOMBRE
    if (strlen($datos["nombre"])<2) {
      $errores["nombre"] = "El nombre debe ser mayor a 2 caracteres.";
    } elseif (!preg_match("/^[a-zA-Z áéíóúÁÉÍÓÚñÑüÜ]*$/",$datos["nombre"])) {
      $errores["nombre"] = "Sólo se permiten letras y espacios en blanco.";
    }
    // APELLIDO
    if (strlen($datos["apellido"])<2) {
      $errores["apellido"] = "El apellido debe ser mayor a 2 caracteres.";
    } elseif (!preg_match("/^[a-zA-Z áéíóúÁÉÍÓÚñÑüÜ]*$/",$datos["apellido"])) {
      $errores["apellido"] = "Sólo se permiten letras y espacios en blanco.";
    }
    // CONTRASEÑA
    if (strlen($datos["password"])<8) {
      $errores["password"] = "La contraseña debe ser mayor a 8 caracteres.";
    } elseif (strlen($datos["password"])>16) {
      $errores["password"] = "La contraseña debe ser menor a 16 caracteres.";
    } elseif (!preg_match('`[a-z]`',$datos["password"])){
      $errores["password"] = "La clave debe tener al menos una letra minúscula";
   } elseif (!preg_match('`[A-Z]`',$datos["password"])){
      $errores["password"] = "La clave debe tener al menos una letra mayúscula";
   } elseif (!preg_match('`[0-9]`',$datos["password"])){
      $errores["password"] = "La clave debe tener al menos un caracter numérico";
   }
    // CONFIRMACIÓN DE CONTRASEÑA
    if ($datos["password"]!==$datos["passwordConfirm"]) {
      $errores["passwordConfirm"] = "Las contraseñas no coinciden.";
    }
    // MAYOR DE 18
    if (date("Y")-$datos["fnacanio"]<18) {
      $errores["edad"] = "Debe ser mayor de 18 años";
    }
    // CÓDIGO DE ÁREA (TEL)
    if ($datos["telcod"]<11) {
      $errores["telcod"] = "Código de área inválido.";
    } elseif ($datos["telcod"]>3894) {
      $errores["telcod"] = "Código de área inválido.";
    }
    // NÚMERO DE TELÉFONO
    if ($datos["telefono"]<1) {
      $errores["telefono"] = "Número de teléfono inválido.";
    }
    // DNI
    if ($datos["dni"]<1) {
      $errores["dni"] = "DNI inválido.";
    } elseif ($datos["dni"]>100000000) {
      $errores["dni"] = "DNI inválido.";
    }
    // IMAGEN
    if ($_FILES["avatar"]["size"] > 500000) {
      $errores["avatar"] = "El archivo es demasiado grande";
    }

    return $errores;
  }


  function guardarUsuario($datos){
    $archivo = file_get_contents("datos.json");
    $guardados = json_decode($archivo, true);
    $datos["password"] = password_hash($datos["password"],PASSWORD_DEFAULT);
    unset($datos["passwordConfirm"]);
    $ultimoID = (count($guardados["usuarios"]));
    $target_dir = "assets/uploads/usuarios/$ultimoID/";

    if (!is_dir($target_dir)){
      mkdir($target_dir, 0777, true);
    }
    $usuario = $datos;
    $guardados["usuarios"][]=$usuario;
    $usuarioJson = json_encode($guardados);
    file_put_contents("datos.json",$usuarioJson);
  }

  function logearUsuario($datosLogin){
    $archivo = file_get_contents("datos.json");
    $datos = json_decode($archivo, true);
    for ($i=0; $i < count($datos["usuarios"]); $i++) {
      if ($datos["usuarios"][$i]["email"]==$datosLogin["email"]) {
        if (password_verify($datosLogin["password"],$datos["usuarios"][$i]["password"])) {
          session_start();
          $_SESSION["user"] = $datos["usuarios"][$i]["email"];
          header("location:index.php");
        }
      }
    }
  }



 ?>
