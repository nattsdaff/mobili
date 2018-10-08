<?php
require 'funciones.php';
session_start();
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<?php require("part-head.php"); ?>
<body>
    <?php require ("part-header.php"); ?>
<body>
    <img width="300px" src="<?php echo $_COOKIE["cookie_avatar"]; ?>" alt="">
    <h1>Bienvenido <?php echo $_SESSION['email']; ?></h1>
  </body>
</html>
