<?php
session_start();
require 'funciones.php';
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<?php require("part-head.php"); ?>
  <body>
    <?php require 'part-header.php'; ?>
    <section class="micuenta">
      <div class="container">
        <h2 class="alt-title">MI CUENTA</h2>
        <h2 class="micuenta-message">Hola, <?php echo $_SESSION['email']; ?> </h2>
        <?php if(isset($_COOKIE['cookie_avatar'])){?>
          <img width="300px" class="perfil-avatar" src="<?php echo $_COOKIE["cookie_avatar"]; ?>" alt="">
        <?php }else{ ?>
            <i class="far fa-smile"></i><?php } ?>
        <div class="container-cuenta">
        </div>
        <a href="modificar-usuario.php" class="submitBtn gris">Modificar mis datos</a>
      </div>
    </section>
  </body>
</html>