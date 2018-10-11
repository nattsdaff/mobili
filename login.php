<?php
session_start();
if (isset($_COOKIE["cookie_recordar"]) || !empty($_SESSION))  {
  header("Location: index.php");
}
require('funciones.php');
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
<?php require("inc/head.php") ?>
<body>
    <?php require("inc/header.php") ?>
    <!--LOGIN-->
    <section class="login">
      <div class="container">
        <div class="container-form">
          <h2 class="alt-title">Ingresar</h2>
          <p class="login-info">¿Tenés cuenta? Ingresá ahora.</p>
          <form action="#" method="post">

            <!-- EMAIL -->
            <div class="form-item">
              <label for="email" class="form-label">Email *</label>
              <input type="text" id="email" class="form-field" name="email" value="<?php echo (isset($_POST["email"]))?$_POST["email"]:""; ?>" required placeholder= <?php
                echo (isset($_COOKIE["cookie_recordar"]))?$_COOKIE["cookie_email"] : "";
                ?>
              >
            </div>
            <!-- CONTRASEÑA -->
            <div class="form-item">
              <label for="inputPassword" class="form-label">Contraseña *</label>
              <input type="password" id="inputPassword" name="password" class="form-field" value="" required>
            </div>

            <?php echo (isset($error))?'<div class="form-error"><p>'.$error.'</p></div>':""; ?>

          <!-- RECORDAR EMAIL -->
            <div class="form-checkbox">
              <input type="checkbox" name="recordar" value="true" id="checkbox" class="checkbox">
              <label for="checkbox"><p>Recordarme</p></label>
            </div>

            <div><input type="submit" value="Enviar" class="submit-btn gris"></div>
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
    <?php require("inc/footer.php"); ?>
    <?php require("inc/scripts.php") ?>
  </body>
</html>