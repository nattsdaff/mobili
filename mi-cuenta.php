<?php
session_start();
require 'funciones.php';
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<?php require("inc/head.php"); ?>
  <body>
    <?php require("inc/header.php") ?>
    <section class="micuenta">
      <div class="container">
        <h2 class="alt-title">MI CUENTA</h2>
        <h1 class="micuenta-message">Hola, <?php echo (isset($_COOKIE["cookie_nombre"]))?$_COOKIE["cookie_nombre"]:$_SESSION["nombre"]; ?> </h1>
    <?php if(isset($_COOKIE["cookie_avatar"])){ ?>
        <img width="300px" class="perfil-avatar" src="<?php echo $_COOKIE["cookie_avatar"] ?>" alt="">
    <?php } elseif(isset($_SESSION['avatar'])){ ?>
        <img width="300px" class="perfil-avatar" src="<?php echo $_SESSION['avatar']; ?>" alt="">
    <?php } else { ?>
        <i class="far fa-smile"></i>
    <?php } ?>
        <div class="container-cuenta">
        </div>
        <a href="modificar-usuario.php" class="submit-btn gris">Modificar mis datos</a><br>
        <a href="logout.php" class="submit-btn verde-claro">Salir</a><br>
      </div>
    </section>
    <?php require("inc/footer.php"); ?>
    <?php require("inc/scripts.php") ?>
  </body>
</html>