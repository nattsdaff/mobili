<?php
    require ("part-head.php");

    $meses=["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];

    if ($_POST) {
      $email=$_POST["email"];
      $nombre = $_POST["nombre"];
    	$apellido = $_POST["apellido"];
      $dia = $_POST["fnacdia"];
      $mes = $_POST["fnacmes"];
      $anio = $_POST["fnacanio"];
      $telcod = $_POST["telcod"];
      $telefono = $_POST["telefono"];
      $dni = $_POST["dni"];

      $errores = validacionRegistro($_POST);
      if (empty($errores)) {
        guardarUsuario($_POST);
      }
    }
?>

<body>
    <?php require ("part-header.php"); ?>

    <!--REGISTER-->
    <!--LOGIN-->
    <section class="login">
      <div class="container">
        <div class="container-form">
        <h2 class="alt-title">Registrate</h2>
        <p class="login-info">Disfrutá del 1-click checkout, accedé a tus pedidos y gestioná tu cuenta.</p>
        <form action="#" method="post" enctype="multipart/form-data">
          <!-- EMAIL -->
          <div class="formGroup">
            <input type="text" name="email" value="<?php echo (isset($_POST["email"]))?$_POST["email"]:""; ?>" placeholder="Email *" required class="formField">
            <?php echo (isset($errores["email"]))?'<p class="error">'.$errores["email"].'</p>':""; ?>

          </div>

          <!-- NOMBRE -->
          <div class="formGroup" id="nombre">
            <input type="text" name="nombre" value="<?php echo (isset($_POST["nombre"]))?$_POST["nombre"]:""; ?>" placeholder="Nombre *" required class="formField">
            <?php echo (isset($errores["nombre"]))?'<p class="error">'.$errores["nombre"].'</p>':""; ?>
          </div>
          <!-- APELLIDO -->
          <div class="formGroup" id="apellido">
            <input type="text" name="apellido" value="<?php echo (isset($_POST["apellido"]))?$_POST["apellido"]:""; ?>" placeholder="Apellido *" required class="formField">
            <?php if (isset($errores["apellido"])) {
							echo '<p class="error">'.$errores["apellido"].'</p>';
						} ?>
          </div>
          <!-- CONTRASEÑA -->
          <div class="formGroup">
            <input type="password" name="password" value="" placeholder="Contraseña *" required class="formField" id="inputPassword">
            <p class="validacionPassword">Debe tener al menos 6 caracteres.</p>
            <?php echo (isset($errores["password"]))?'<p class="error" id="invalida">'.$errores["password"].'</p>':""; ?>
          </div>
          <!-- CONFIRMACIÓN DE CONTRASEÑA -->
          <div class="formGroup">
            <input type="password" name="passwordConfirm" value="" placeholder="Confirmar contraseña *" required class="formField">
            <?php echo (isset($errores["passwordConfirm"]))?'<p class="error">'.$errores["passwordConfirm"].'</p>':""; ?>
          </div>
          <!-- FECHA DE NACIMIENTO -->
          <label for="fecha-de-nacimiento" id="formLabel">Fecha de nacimiento *</label>
          <!-- DÍA -->
          <div class="fnac">
            <select class="formField" name="fnacdia" id="fnacdia">
            <?php for ($i=1; $i <= 31; $i++) {
              if (isset($dia)&&$dia==$i) {
                echo "<option selected value=$i>$i</option>";
              }else {
                echo "<option value=$i>$i</option>";
              }

            } ?>
            </select>
            <!-- MES -->
            <select class="formField" name="fnacmes" id="fnacmes">
              <?php for ($i=0; $i < count($meses); $i++) {
								if (isset($mes)&&$mes==($i+1)) {
										echo "<option selected value=".($i+1).">$meses[$i]</option>";
								}else {
										echo "<option value=".($i+1).">$meses[$i]</option>";
								}

							} ?>
            </select>
            <!-- AÑO -->
            <select class="formField" name="fnacanio" id="fnacanio">
              <?php for ($i=1903; $i < 2019; $i++) {
                if (isset($anio)&&$anio==$i) {
                echo "<option selected value=$i>$i</option>";
              }else {
                echo "<option value=$i>$i</option>";
              }
              } ?>
            </select>
          </div>
          <?php echo (isset($errores["edad"]))?'<p class="error">'.$errores["edad"].'</p>':""; ?>
          <!-- TELÉFONO -->
          <label for="telefono" id="formLabel">Teléfono</label>
          <!-- CÓDIGO DE ÁREA -->
          <div class="formGroup">
            <input type="text" name="telcod" value="<?php echo (isset($_POST["telcod"]))?$_POST["telcod"]:""; ?>" placeholder="Ej: 011" class="formField">
            <?php echo (isset($errores["telcod"]))?'<p class="error">'.$errores["telcod"].'</p>':""; ?>
          </div>
          <!-- NÚMERO DE TELÉFONO -->
          <div class="formGroup">
            <input type="text" name="telefono" value="<?php echo (isset($_POST["telefono"]))?$_POST["telefono"]:""; ?>" placeholder="Ej: 48251784" class="formField">
            <?php echo (isset($errores["telefono"]))?'<p class="error">'.$errores["telefono"].'</p>':""; ?>
          </div>
          <!-- DNI -->
          <div class="formGroup">
            <input type="text" name="dni" value="<?php echo (isset($_POST["dni"]))?$_POST["dni"]:""; ?>" placeholder="DNI" class="formField">
            <?php echo (isset($errores["dni"]))?'<p class="error">'.$errores["dni"].'</p>':""; ?>
          </div>


          <!-- IMAGEN -->
          <label for="file" id="formLabel">Imagen:</label>
          <div class="formGroup">
            <input type="file" name="avatar" class="file" value="">
            <?php echo (isset($errores["avatar"]))?"<br><br><br>".'<p class="error" id="errorImagen">'.$errores["avatar"].'</p>':""; ?>
          </div>

          <input type="submit" value="Crear cuenta" class="formBtn verde">
        </form>
        </div>
      </div>
      <div class="container aside">
        <p>¿Ya tenés cuenta en Mobili?</p><p><a href="login.php">Ingresar</a></p>
      </div>
    </section>

    <?php require ("part-footer.php"); ?>
    <?php require ("part-scripts.php"); ?>
  </body>
</html>
