<?php
  function validacionRegistro($datos){
    $errores=[];
    // EMAIL
    if (!filter_var($datos["email"], FILTER_VALIDATE_EMAIL)){
      $errores["email"] = "Por favor ingrese un e-mail válido";
    } elseif (validarSiExiste($datos["email"])) {
      $errores["email"] = "El email ingresado ya se encuentra registrado";
    }
    // NOMBRE
    if (strlen($datos["nombre"])<2) {
      $errores["nombre"] = "El nombre debe tener al menos dos caracteres.";
    } elseif (!preg_match("/^[a-zA-Z áéíóúÁÉÍÓÚñÑüÜ]*$/",$datos["nombre"])) {
      $errores["nombre"] = "Sólo se permiten letras y espacios en blanco.";
    }
    // APELLIDO
    if (strlen($datos["apellido"])<2) {
      $errores["apellido"] = "El apellido debe tener al menos dos caracteres.";
    } elseif (!preg_match("/^[a-zA-Z áéíóúÁÉÍÓÚñÑüÜ]*$/",$datos["apellido"])) {
      $errores["apellido"] = "Sólo se permiten letras y espacios en blanco.";
    }
    // CONTRASEÑA
    if (strlen($datos["password"])<6) {
      $errores["password"] = "Contraseña inválida.";
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
    if ((!empty($datos["telcod"])) && ($datos["telcod"]<11 || $datos["telcod"]>3894)) {
      $errores["telcod"] = "Código de área inválido.";
    }
    // NÚMERO DE TELÉFONO
    if ((!empty($datos["telefono"])) && $datos["telefono"]<1) {
      $errores["telefono"] = "Número de teléfono inválido.";
    }
    // DNI
    if ((!empty($datos["dni"])) && ($datos["dni"]<1 || $datos["dni"]>100000000)) {
      $errores["dni"] = "DNI inválido.";
    }
    // IMAGEN
    if ($_FILES["avatar"]["size"] > 500000) {
      $errores["avatar"] = "El archivo es demasiado grande";
    } elseif (($_FILES["avatar"]["type"] !== "image/gif") && ($_FILES["avatar"]["type"] !== "image/jpeg") && ($_FILES["avatar"]["type"] !== "image/jpg") && ($_FILES["avatar"]["type"] !== "image/png")) {
      $errores["avatar"] = "La imagen debe ser .gif, .jpg, .jpeg o .png.";
    }
    return $errores;
  }
  function guardarUsuario($datos){
    // ABRIR ARCHIVO
    $archivo = file_get_contents("datos.json");
    // CONVERTIR EL ARCHIVO EN ALGO UTILIZABLE POR PHP
    $guardados = json_decode($archivo, true);
    // ENCRIPTAR CONTRASEÑA
    $datos["password"] = password_hash($datos["password"],PASSWORD_DEFAULT);
    // BORRADO CONFIRMACIÓN DE CONTRASEÑA (SÓLO PARA VALIDACIÓN)
    unset($datos["passwordConfirm"]);
    $ultimoID = (count($guardados["usuarios"]));
    $target_dir = "assets/uploads/usuarios/$ultimoID/";
    // TRAIGO ID DEL ÚLTIMO USUARIO
    $ultimoID = count($guardados["usuarios"]);
    // RUTA DONDE GUARDAMOS LA Imagen
    $target_dir = "assets/uploads/usuarios/$ultimoID/";
    // VEMOS SI EXISTE LA CARPETA CON EL ID DEL USUARIO
    if (!is_dir($target_dir)){
      // SI NO EXISTE LA CREAMOS
      mkdir($target_dir, 0777, true);
    }
    // NOMBRE DE LA IMAGEN
    $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
    move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
    // GUARDAMOS EN EL ARRAY DONDE VA A ESTAR LA IMAGEN
    $datos["avatar"] = $target_file;
    //GUARDO EL LUGAR DONDE ESTA GUARDADO EL AVATAR
    setcookie("cookie_avatar", $datos["usuarios"][$i]["avatar"], time() + (86400 * 30));
    $usuario = $datos;
    // PUSHEAMOS LOS DATOS A LA POSICIÓN USUARIOS
    $guardados["usuarios"][]=$usuario;
    // REESCRIBIMOS LOS DATOS
    $usuarioJson = json_encode($guardados);
    file_put_contents("datos.json",$usuarioJson);
    header("Location:login.php");
  }
  function validarSiExiste($email){
    // ABRIMOS EL ARCHIVO
    $archivo = file_get_contents("datos.json");
    // LO CONVERTIMOS EN ALGO UTILIZABLE POR PHP
    $datos = json_decode($archivo, true);
    // RECORREMOS TODOS LOS USUARIOS
    for ($i=0; $i < count($datos["usuarios"]); $i++) {
      // NOS FIJAMOS SI EL EMAIL INGRESADO YA EXISTE
      if ($datos["usuarios"][$i]["email"]==$email) {
        return true;
      }
    }
  }
  function logearUsuario($datosLogin){
    $archivo = file_get_contents("datos.json");
    $datos = json_decode($archivo, true);
    // RECORREMOS TODOS LOS USUARIOS
    for ($i=0; $i < count($datos["usuarios"]); $i++) {
      // VALIDAMOS EL MAIL
      if ($datos["usuarios"][$i]["email"]==$datosLogin["email"]) {
        // VALIDAMOS LA CONTRASEÑA
        if (password_verify($datosLogin["password"],$datos["usuarios"][$i]["password"])) {
          // INICIAMOS LA SESIÓN
          session_start();
          $_SESSION["email"] = $datos["usuarios"][$i]["email"];
          //GUARDO EL EMAIL EN UNA COOKIE
          setcookie("cookie_email", $_SESSION["email"], time() + (86400 * 30));
          var_dump($_COOKIE["cookie_email"]);
          // REDIRIGIMOS AL INDEX
          header("Location:perfil.php");
          break;
        }
      }
    }
    return "Los datos ingresados no son correctos";
  }
