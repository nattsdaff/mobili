<?php 
require('config.php');
if (!isset($_COOKIE["cookie_newUser"])){
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<?php require("inc/head.php"); ?>
<body>
    <?php require("inc/header.php"); ?>

    <!--EXITO-->
    <section class="exito">
      <div class="container">
        <div class="container-exito">
          <h2 class="alt-title">Bienvenida/o</h2>
          <p class="exito-message">Te has registrado con éxito en mobili.com </p>
          <a href="login.php" class="btn gris">Ingresar</a><br>
</div>
      </div>
    </section>
    <!--END OF EXITO-->

    <?php require ("inc/footer.php"); ?>
    <?php require ("inc/scripts.php"); ?>
  </body>
</html>