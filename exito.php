<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<?php require("inc/head.php"); ?>
<body>
    <?php require("inc/header.php"); ?>

    <!--EXITO-->
    <section class="exito">
      <div class="container">
        <h2 class="alt-title">Bienvenida/o</h2>
        <p class="exito-message">Te has registrado con éxito en mobili.com </p>
        <a href="login.php" class="btn gris">Ingresar</a><br>
      </div>
    </section>
    <!--END OF EXITO-->

    <?php require ("inc/footer.php"); ?>
    <?php require ("inc/scripts.php"); ?>
  </body>
</html>
