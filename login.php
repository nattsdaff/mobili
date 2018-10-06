<?php
  require ("part-head.php");
  require("funciones.php");
  if ($_POST) {
    logearUsuario($_POST);
  }

 ?>

<body>
    <?php require ("part-header.php"); ?>

    <!--LOGIN-->
    <section class="login">
      <div class="container">
        <div class="container-form">
          <form action="#" method="post">
            <h2 class="alt-title">Ingresar</h2>
            <p class="login-info">¿Tenés cuenta? Ingresá ahora.</p>
            <input type="text" name="email" value="<?php echo (isset($_POST["email"]))?$_POST["email"]:""; ?>" placeholder="Dirección de e-mail" required class="formField">
            <input type="password" name="password" value="" placeholder="Contraseña" required class="formField">
            <input type="submit" value="Enviar" class="formBtn gris">

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

    <?php require ("part-footer.php"); ?>
    <?php require ("part-scripts.php"); ?>
  </body>
</html>
