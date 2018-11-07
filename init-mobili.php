<?php
require 'funciones.php';
// if ($_GET) {
//     isset($_POST["puertoMySQL"])?$puertoMySQL=$_POST["puertoMySQL"]:"";
//     migrarJsonAMySQL($db, $usuarioMySQL, $passwordMySQL);
//     header('Location:index.php');
// }
if ($_POST) {

    isset($_POST["puertoMySQL"])?$puertoMySQL=$_POST["puertoMySQL"]:"";
    isset($_POST["usuarioMySQL"])?$usuarioMySQL=$_POST["usuarioMySQL"]:"";
    isset($_POST["passwordMySQL"])?$passwordMySQL=$_POST["passwordMySQL"]:"";

    $errores=[];

    if (strlen($_POST["puertoMySQL"])!=4) {
        $errores["puertoMySQL"] = "El puerto debe ser 4 dígitos";
    }
    if (strlen($_POST["usuarioMySQL"])<2) {
        $errores["usuarioMySQL"] = "El nombre debe tener al menos dos caracteres.";
    }
    // CONTRASEÑA
    if (strlen($_POST["passwordMySQL"])<2) {
        $errores["passwordMySQL"] = "La contraseña debe tener al menos dos caracteres.";
    }

    if (empty($errores)) {
        initDB($puertoMySQL, $usuarioMySQL, $passwordMySQL);
        // header('Location:index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<?php require("inc/head.php"); ?>
  <body>
    <?php require("inc/header.php") ?>
    <section class="login" style="height: 90vh; margin:10rem 0;">
        <div class="container">
            <div class="container-login" style="width: 100%;">
                <form action="" method="POST" style="display: flex;">
                    <div class="info" style="width: 60%;padding: 0 2rem;">
                        <h2 class="alt-title">MySQL</h2>
                        <div class="form-item">
                            <!-- PUERTO -->
                            <label for="puertoMySQL" class="form-label">Puerto MYSQL<span style="color:red;">*</span></label>
                            <input type="text" id="puertoMySQL" class="form-field" name="puertoMySQL" required placeholder="8889" style="border: 1px #ccc solid;">
                            <?php echo (isset($errores["puertoMySQL"]))?'<div class="form-error"><p>'.$errores["puertoMySQL"].'</p></div>':""; ?>
                            <!-- USUARIO -->
                            <label for="usuarioDb" class="form-label">Usuario MYSQL<span style="color:red;">*</span></label>
                            <input type="text" id="usuarioDb" class="form-field" name="usuarioMySQL" required placeholder="root" style="border: 1px #ccc solid;">
                            <?php echo (isset($errores["usuarioMySQL"]))?'<div class="form-error"><p>'.$errores["usuarioMySQL"].'</p></div>':""; ?>
                            <!-- CONTRASEÑA -->
                            <label for="inputPassword" class="form-label">Contraseña MYSQL<span style="color:red;">*</span></label>
                            <input type="password" id="inputPassword" name="passwordMySQL" class="form-field" required placeholder="root" style="border: 1px #ccc solid;">
                            <?php echo (isset($errores["passwordMySQL"]))?'<div class="form-error"><p>'.$errores["passwordMySQL"].'</p></div>':""; ?>
                        </div>
                        <input type="submit" name="btn_submit" class="btn btn-info" value="Crear Mobili DB"  style="width: 100%;"/>
                    </div>
                </form>
                <form action="" method="GET" style="display: flex;">
                    <div class="info" style="width: 50%;padding: 0 2rem;">
                        <h2 class="alt-title">Migrar</h2>
                        <a href="set-db.php?a=m" class="btn gris-claro" style="width: 100%;;">Migrar de Json a MySQL</a>
                    </div>
                </form>
            </div>            
        </div>            
    </section>
    <?php require("inc/footer.php"); ?>
    <?php require("inc/scripts.php") ?>
  </body>
</html>