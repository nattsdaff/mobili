<?php
require('funciones.php');
$db = newPDO();
if(!$db){
    if ($_POST) {

        isset($_POST["db_port"])?$db_port=$_POST["db_port"]:"";
        isset($_POST["db_user"])?$db_user=$_POST["db_user"]:"";
        isset($_POST["db_pass"])?$db_pass=$_POST["db_pass"]:"";

        $errores=[];

        if (strlen($_POST["db_port"])!=4) {
            $errores["db_port"] = "El puerto debe ser 4 dígitos";
        }
        if (strlen($_POST["db_user"])<2) {
            $errores["db_user"] = "El nombre debe tener al menos dos caracteres.";
        }
        // CONTRASEÑA
        if (strlen($_POST["db_pass"])<2) {
            $errores["db_pass"] = "La contraseña debe tener al menos dos caracteres.";
        }

        if (empty($errores)) {
            initDB($db_port, $db_user, $db_pass);
            header('Location:init.php');
        }
    }
} else {
    if ($_GET) {
        $json_config = file_get_contents("config.json");
        $guardados = json_decode($json_config, true);
        $db_name = $guardados['nombre'];
        $db_user = $guardados['usuario'];
        $db_pass = $guardados['password'];
        migrateJsonAMySQL($db_user, $db_pass);
        header('Location:index.php');
    } else {
        $warning = 1;
    }
}


?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<?php require("inc/head.php"); ?>
  <body>
    <section class="init">
        <div class="container">
        <?php echo (isset($warning))?'<header style="background: #1ea0ff;color: white;padding: 1rem;margin-bottom: 5rem;"><p>Atención: La base de datos ya fue creada y la conexión establecida. Si lo desea puede migrar los usuarios guardados en su archivo .json o bien <a style="color: white;font-weight: 600;font-size: 1.1em;text-decoration: underline;" href="index.php">ingresar a mobili</a></p></header>':'<header style="background: #ef4444;color: white;padding: 1rem;margin-bottom: 5rem;"><p style="font-weight:600;">Atención: Este sitio necesita una base de datos para su funcionamiento. Por favor complete el formulario con sus datos para crear una.</p></header>'?>
        <h1 class="alt-title">INICIALIZAR MOBILI</h1>
            <div class="container-init" style="width: 100%;display: flex;margin-top:1rem;">
                <form action="init.php" method="POST" style="width: 100%;">
                    <div class="info" style="padding: 0 2rem;">
                        <h2 class="alt-title">Paso 1</h2>
                        <p class="register-info">Crear base de datos y tabla "usuarios"</p>
                        <div class="form-item">
                            <!-- PUERTO -->
                            <label for="db_port" class="form-label">Puerto MYSQL<span style="color:red;">*</span></label>
                            <input type="text" id="db_port" class="form-field" name="db_port" required placeholder="8889" style="border: 1px #ccc solid;margin-bottom: 0rem;">
                            <?php echo (isset($errores["db_port"]))?'<div class="form-error"><p>'.$errores["db_port"].'</p></div>':""; ?>
                            <!-- USUARIO -->
                            <label for="usuarioDb" class="form-label">Usuario MYSQL<span style="color:red;">*</span></label>
                            <input type="text" id="usuarioDb" class="form-field" name="db_user" required placeholder="root" style="border: 1px #ccc solid;margin-bottom: 0rem;">
                            <?php echo (isset($errores["db_user"]))?'<div class="form-error"><p>'.$errores["db_user"].'</p></div>':""; ?>
                            <!-- CONTRASEÑA -->
                            <label for="inputPassword" class="form-label">Contraseña MYSQL<span style="color:red;">*</span></label>
                            <input type="password" id="inputPassword" name="db_pass" class="form-field" required placeholder="root" style="border: 1px #ccc solid;margin-bottom: 0rem;">
                            <?php echo (isset($errores["db_pass"]))?'<div class="form-error"><p>'.$errores["db_pass"].'</p></div>':""; ?>
                        </div>
                        <!--Agregarle un estilo en estado disabled para diferenciar-->
                        <input type="submit" name="btn_submit" class="btn btn-info" value="CREAR" <?php echo(isset($warning))?'disabled':'' ?> style="width: 100%;"/>
                    </div>
                </form>
                <form action="" method="GET" style="width: 100%;">
                    <div class="info" style="padding: 0 2rem;">
                        <h2 class="alt-title">Paso 2:</h2>
                        <p class="register-info">Migrar registros desde archivo Json a DB MySQL</p>
                        <input type="submit" name="btn_submit" class="btn btn-info" value="Migrar"  style="width: 100%;margin-top: 5.3rem;"/>
                    </div>
                </form>
            </div>            
        </div>            
    </section>
    <?php require("inc/scripts.php") ?>
  </body>
</html>