<?php
session_start();
require 'funciones.php';
$meses=["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];

if ($_POST) {
  $email=$_POST["email"];
  $nombre = $_POST["nombre"];
  $apellido = $_POST["apellido"];
  $dia = $_POST["fnacdia"];
  $mes = $_POST["fnacmes"];
  $anio = $_POST["fnacanio"];
  $telcod = $_POST["telcod"];
  $telefono = $_POST["telefono"];
  $dni = $_POST["dni"];

  $errores = validacionRegistro($_POST);
  if (empty($errores)) {
    guardarUsuario($_POST);
    header('Location:login.php');
  }
}
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<?php require("part-head.php"); ?>
<body>
    <?php require ("part-header.php"); ?>
    <!--REGISTER-->
    <!--LOGIN-->
    <section class="login">
      <div class="container">
        <div class="container-form">
        <h2 class="alt-title">Registrarme</h2>
        <p class="login-info">Disfrutá del 1-click checkout, accedé a tus pedidos y gestioná tu cuenta.</p>
        <form action="#" method="post" enctype="multipart/form-data">

          <!-- EMAIL -->
          <div class="formGroup">
            <label for="email" class="form-label">Email *</label>
            <input type="text" id="email" class="formField" name="email" value="<?php echo (isset($_POST["email"]))?$_POST["email"]:""; ?>" required>
            <?php echo (isset($errores["email"]))?'<p class="error">'.$errores["email"].'</p>':""; ?>
          </div>

          <!-- NOMBRE -->
          <div class="formGroup" id="nombre">
            <label for="nombre" class="form-label">Nombre *</label>
            <input type="text" id="nombre" name="nombre" class="formField" value="<?php echo (isset($_POST["nombre"]))?$_POST["nombre"]:""; ?>" required>
            <?php echo (isset($errores["nombre"]))?'<p class="error">'.$errores["nombre"].'</p>':""; ?>
          </div>

          <!-- APELLIDO -->
          <div class="formGroup" id="apellido">
            <label for="apellido" class="form-label">Apellido *</label>
            <input type="text" id="apellido" class="formField" name="apellido" value="<?php echo (isset($_POST["apellido"]))?$_POST["apellido"]:""; ?>" required>
            <?php if (isset($errores["apellido"])) {
							echo '<p class="error">'.$errores["apellido"].'</p>';
						} ?>
          </div>

          <!-- CONTRASEÑA -->
          <div class="formGroup">
            <label for="inputPassword" class="form-label">Contraseña *</label>
            <input type="password" id="inputPassword" name="password" class="formField" value="" required placeholder="Al menos 6 caracteres">
            <?php echo (isset($errores["password"]))?'<p class="error">'.$errores["password"].'</p>':""; ?>
          </div>
          <!-- CONFIRMACIÓN DE CONTRASEÑA -->
          <div class="formGroup">
            <label for="passwordConfirm" class="form-label">Confirmar contraseña *</label>
            <input type="password" id="passwordConfirm" name="passwordConfirm" class="formField" value="" placeholder="Contraseña" required>
            <?php echo (isset($errores["passwordConfirm"]))?'<p class="error">'.$errores["passwordConfirm"].'</p>':""; ?>
          </div>

          <!-- FECHA DE NACIMIENTO -->
          <label for="fnacdia" class="form-label">Fecha de nacimiento *</label>
          <!-- DÍA -->
          <div class="fecha-nacimiento">
            <div class="fnacdia">
              <select id="fnacdia" class="formField" name="fnacdia">
              <?php for ($i=1; $i <= 31; $i++) {
                if (isset($dia)&&$dia==$i) {
                  echo "<option selected value=$i>$i</option>";
                }else {
                  echo "<option value=$i>$i</option>";
                }
              } ?>
              </select>
            </div>
              <!-- MES -->
            <div class="fnacmes">
              <select class="formField" name="fnacmes" id="fnacmes">
                <?php for ($i=0; $i < count($meses); $i++) {
  								if (isset($mes)&&$mes==($i+1)) {
  										echo "<option selected value=".($i+1).">$meses[$i]</option>";
  								}else {
  										echo "<option value=".($i+1).">$meses[$i]</option>";
  								}
  							} ?>
              </select>
            </div>
              <!-- AÑO -->
            <div class="fnacanio">
              <select class="formField" name="fnacanio" id="fnacanio">
                <?php for ($i=1903; $i < 2019; $i++) {
                  if (isset($anio)&&$anio==$i) {
                    echo "<option selected value=$i>$i</option>";
                  }else {
                    echo "<option value=$i>$i</option>";
                  }
                } ?>
              </select>
            </div>
          </div>           
          <?php echo (isset($errores["edad"]))?'<p class="error">'.$errores["edad"].'</p>':""; ?>

          <!-- TELÉFONO -->
          <div class="telefono">
            <div class="tel-area">
              <label for="telcod" class="form-label">Cód. Area</label>
              <input type="text" id="telcod" name="telcod" class="formField" value="<?php echo (isset($_POST["telcod"]))?$_POST["telcod"]:""; ?>" placeholder="Ej. 011">
              <?php echo (isset($errores["telcod"]))?'<p class="error">'.$errores["telcod"].'</p>':""; ?>
            </div>
            <div class="tel-nro">
              <label for="telefono" class="form-label">Teléfono</label>
              <input type="text" id="telefono" name="telefono" class="formField" value="<?php echo (isset($_POST["telefono"]))?$_POST["telefono"]:""; ?>" placeholder="Número de teléfono">
              <?php echo (isset($errores["telefono"]))?'<p class="error">'.$errores["telefono"].'</p>':"";?>
            </div>
          </div>

          <!-- DNI -->
          <div class="formGroup">
            <label for="dni" class="form-label">DNI</label>
            <input type="text" id="dni" name="dni" class="formField" value="<?php echo (isset($_POST["dni"]))?$_POST["dni"]:""; ?>" placeholder="DNI">
            <?php echo (isset($errores["dni"]))?'<p class="error">'.$errores["dni"].'</p>':""; ?>
          </div>


          <!-- IMAGEN -->
          <div class="formGroup">
            <label for="avatar" class="form-label">Foto de perfil</label>
            <input type="file" id="avatar" name="avatar" class="file" value="">
            <?php echo (isset($errores["avatar"]))?"<br><br><br>".'<p class="error" id="errorImagen">'.$errores["avatar"].'</p>':""; ?>
          </div>

          <input type="submit" value="Crear cuenta" class="formBtn verde">
        </form>
        </div>
      </div>
      <div class="container aside">
        <p>¿Ya tenés cuenta en Mobili?</p><p><a href="login.php">Ingresar</a></p>
      </div>
    </section>

    <?php require("part-footer.php"); ?>
    <?php require("part-scripts.php"); ?>
  </body>
</html>
