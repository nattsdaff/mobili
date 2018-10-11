<?php
session_start();
require 'funciones.php';
// ONLY FOR TESTING SI LA SESSION ESTA CERRADA LUEGO DEL LOGOUT.
// ---- SIEMPR COMENTADO EN PRODUCCION ---- PORQUE SI NO, TIRA ERROR DE HEADERS
    // $has_session = session_status() == PHP_SESSION_ACTIVE;
    // var_dump($has_session);
// END TEST
if ($_POST) {
  $error = logearUsuario($_POST);
}
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<?php require 'part-head.php'; ?>
<body>
    <?php require 'part-header.php'; ?>
    <!--LOGIN-->
    <section class="login">
      <div class="container">
        <div class="container-form">
          <h2 class="alt-title">Ingresar</h2>
          <p class="login-info">¿Tenés cuenta? Ingresá ahora.</p>
          <form action="#" method="post">

            <div class="form-login">
              <!-- EMAIL -->
              <div class="formGroup">
                <label for="email" class="form-label">Email *</label>
                <input type="text" id="email" class="formField" name="email" value="<?php echo (isset($_POST["email"]))?$_POST["email"]:""; ?>" required placeholder= <?php echo (isset($_COOKIE["cookie_recordar"]))?$_COOKIE["cookie_email"] : ""; ?>
                >
                <?php echo (isset($errores["email"]))?'<div class="form-error"><p>'.$errores["email"].'</p></div>':""; ?>
              </div>
              <!-- CONTRASEÑA -->
              <div class="formGroup">
                <label for="inputPassword" class="form-label">Contraseña *</label>
                <input type="password" id="inputPassword" name="password" class="formField" value="" required placeholder="Al menos 6 caracteres">
                <?php echo (isset($errores["password"]))?'<div class="form-error"><p>'.$errores["password"].'</p></div>':""; ?>
              </div>
            </div>

          <!-- RECORDAR EMAIL -->
            <div class="container-checkbox">
              <input type="checkbox" name="recordar" value="true" id="checkbox" class="formCheckbox">
              <label for="checkbox"><p>Recordarme</p></label>
            </div>
          </form>
        </div>
        <div class="container-forgot">
          <p><a href="#">¿Olvidaste tu contraseña?</a></p>
        </div>
      </div>
      <div class="container aside">
        <p>¿No tenés una cuenta en mobili?</p><p><a href="register.php">Crear una</a></p><br><br>
      </div>
    </section>
    <!--END OF LOGIN-->

    <?php require("part-footer.php"); ?>
    <?php require("part-scripts.php"); ?>
  </body>
</html>
