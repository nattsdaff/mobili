<?php
require('config.php');
if (!isset($_COOKIE["cookie_recordar"]) && empty($_SESSION))  {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<?php require("inc/head.php"); ?>
  <body>
    <?php require("inc/header.php") ?>
    <section class="micuenta">
        <!-- HOLA, USUARIO       -->
        <div class="container">
            <div class="container-micuenta">
                <div class="info">
                    <h2 class="alt-title">MI CUENTA</h2>
                    <h1>Hola, <?php echo (isset($_COOKIE["cookie_nombre"]))?$_COOKIE
                ["cookie_nombre"]:$_SESSION["nombre"]; ?> </h1>
                    <p>Próximamente vas a poder editar toda tu información, ver el detalle de tus compras y mucho más.</p><br>
                    <a href="#" class="btn verde">Editar</a><br>
                    <a href="logout.php" class="btn gris-claro">Salir</a><br>
                </div>
                <!-- AVATAR       -->
                <div class="avatar">
                    <?php if(isset($_COOKIE["cookie_avatar"])){ ?>
                    <img class="avatar" src="<?php echo $_COOKIE["cookie_avatar"] ?>" alt="">
                    <?php } elseif(isset($_SESSION['avatar'])){ ?>
                    <img class="avatar" src="<?php echo $_SESSION['avatar']; ?>" alt="">
                    <?php } else { ?>
                    <i class="far fa-smile"></i>
                    <?php } ?>
                </div>
            </div>            
        </div>            
    </section>
    <?php require("inc/footer.php"); ?>
    <?php require("inc/scripts.php") ?>
  </body>
</html>