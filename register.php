<?php
require('config.php');

if (isset($_COOKIE["cookie_recordar"]) || !empty($_SESSION))  {
  header("Location: index.php");
}

$meses=["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];

if ($_POST) {
  $email=$_POST["email"];
  $nombre = $_POST["nombre"];
  $apellido = $_POST["apellido"];
  $password = $_POST["password"];
  $fnacdia = $_POST["fnacdia"];
  $fnacmes = $_POST["fnacmes"];
  $fnacanio = $_POST["fnacanio"];
  $telcod = $_POST["telcod"];
  $telefono = $_POST["telefono"];
  $dni = $_POST["dni"];

  $user = new User($email, $nombre, $apellido, $password, $fnacdia, $fnacmes, $fnacanio, $telcod, $telefono, $dni); 
  $errores = Validar::validacionRegistro($user, $_POST, $db);
  
  if (empty($errores)) {
    $guardado = Mysql::guardarUsuario($user, $db);
    if($guardado) { 
        header("Location:exito.php"); 
    }
  }
}
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<?php require("inc/head.php"); ?>
<body>
    <?php require("inc/header.php"); ?>
    <!--REGISTER-->
    <!--LOGIN-->
    <section class="register">
      <div class="container">
      <div style="text-align:center;"><p>¿Ya tenés cuenta en Mobili? <a href="login.php">Ingresar</a></p></div>
          <div class="container-form">
            
            <h2 class="alt-title">Registrarme</h2>
            <p class="register-info">Disfrutá del 1-click checkout, accedé a tus pedidos y gestioná tu cuenta.</p>
            <form action="#" method="post" enctype="multipart/form-data" class="form">

              <!-- EMAIL -->
              <div class="form-item">
                <label for="email" class="form-label">Email <span style="color:red;">*</span></label>
                <input type="text" id="email" class="form-field" name="email" value="<?php echo (isset($_POST["email"]))?$_POST["email"]:""; ?>" required>
                <?php echo (isset($errores["email"]))?'<div class="form-error"><p>'.$errores["email"].'</p></div>':""; ?>
              </div>

              <!-- NOMBRE -->
              <div class="form-group wrap">
                <div class="form-item" id="nombre">
                  <label for="nombre" class="form-label">Nombre <span style="color:red;">*</span></label>
                  <input type="text" id="nombre" name="nombre" class="form-field" value="<?php echo (isset($_POST["nombre"]))?$_POST["nombre"]:""; ?>" required>
                  <?php echo (isset($errores["nombre"]))?'<div class="form-error"><p>'.$errores["nombre"].'</p></div>':""; ?>
                </div>
                <!-- APELLIDO -->
                <div class="form-item" id="apellido">
                  <label for="apellido" class="form-label">Apellido <span style="color:red;">*</span></label>
                  <input type="text" id="apellido" class="form-field" name="apellido" value="<?php echo (isset($_POST["apellido"]))?$_POST["apellido"]:""; ?>" required>
                  <?php echo (isset($errores["apellido"]))?'<div class="form-error"><p>'.$errores["apellido"].'</p></div>':""; ?>
                </div>
              </div> 

              <!-- CONTRASEÑA -->
              <div class="form-group wrap">
                <div class="form-item">
                  <label for="inputPassword" class="form-label">Contraseña <span style="color:red;">*</span></label>
                  <input type="password" id="inputPassword" name="password" class="form-field" value="" required placeholder="Al menos 6 caracteres">
                  <?php echo (isset($errores["password"]))?'<div class="form-error"><p>'.$errores["password"].'</p></div>':""; ?>
                </div>
                <!-- CONFIRMACIÓN DE CONTRASEÑA -->
                <div class="form-item">
                  <label for="passwordConfirm" class="form-label">Confirmar contraseña <span style="color:red;">*</span></label>
                  <input type="password" id="passwordConfirm" name="passwordConfirm" class="form-field" value="" required>
                  <?php echo (isset($errores["passwordConfirm"]))?'<div class="form-error"><p>'.$errores["passwordConfirm"].'</p></div>':""; ?>
                </div>
              </div>

              <!-- FECHA DE NACIMIENTO -->
              <div class="form-group wrap column">
                <label for="fnacdia" class="form-label">Fecha de nacimiento <span style="color:red;">*</span></label>
                <div class="form-group">
                  <select class="form-field" name="fnacdia">
                    <?php for ($i=1; $i <= 31; $i++) {
                      if (isset($dia)&&$dia==$i) {
                        echo "<option selected value=$i>$i</option>";
                      }else {
                        echo "<option value=$i>$i</option>";
                      }
                    } ?>
                  </select>
                  <select class="form-field grow" name="fnacmes">
                    <?php for ($i=0; $i < count($meses); $i++) {
                      if (isset($mes)&&$mes==($i+1)) {
                          echo "<option selected value=".($i+1).">$meses[$i]</option>";
                      }else {
                          echo "<option value=".($i+1).">$meses[$i]</option>";
                      }
                    } ?>
                  </select>
                  <select class="form-field" name="fnacanio">
                    <?php for ($i=1903; $i < 2019; $i++) {
                      if (isset($anio)&&$anio==$i) {
                        echo "<option selected value=$i>$i</option>";
                      }else {
                        echo "<option value=$i>$i</option>";
                      }
                    } ?>
                  </select>
                </div>
                <?php echo (isset($errores["edad"]))?'<div class="form-error"><p>'.$errores["edad"].'</p></div>':""; ?>
              </div>

              <!-- TELÉFONO -->
              <div class="form-group wrap telefono">
                <div class="form-item codigo">
                  <label for="telcod" class="form-label">Cód. Area</label>
                  <input type="text" id="telcod" name="telcod" class="form-field" value="<?php echo (isset($_POST["telcod"]))?$_POST["telcod"]:""; ?>" placeholder="Ej. 011">
                  <?php echo (isset($errores["telcod"]))?'<div class="form-error"><p>'.$errores["telcod"].'</p></div>':""; ?>
                </div>
                <div class="form-item numero">
                  <label for="telefono" class="form-label">Teléfono</label>
                  <input type="text" id="telefono" name="telefono" class="form-field" value="<?php echo (isset($_POST["telefono"]))?$_POST["telefono"]:""; ?>" >
                  <?php echo (isset($errores["telefono"]))?'<div class="form-error"><p>'.$errores["telefono"].'</p></div>':""; ?>
                </div>
              </div>


              <!-- DNI -->
              <div class="form-item">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" id="dni" name="dni" class="form-field" value="<?php echo (isset($_POST["dni"]))?$_POST["dni"]:""; ?>">
                <?php echo (isset($errores["dni"]))?'<div class="form-error"><p>'.$errores["dni"].'</p></div>':""; ?>
              </div>


              <!-- IMAGEN -->
              <!-- <div class="form-item">
                <label for="avatar" class="form-label">Foto de perfil <span style="color:red;">*</span></label>
                <input type="file" id="avatar" name="avatar" class="file" value="">
                <?php echo (isset($errores["avatar"]))?'<div class="form-error"><p>'.$errores["avatar"].'</p></div>':""; ?>
              </div> -->

              <input type="submit" value="Crear cuenta" class="submit-btn verde">
            </form>
          </div>
        </div>


    </section>

    <?php require("inc/footer.php"); ?>
    <?php require("inc/scripts.php") ?>
  </body>
</html>