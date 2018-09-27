<?php require ("part-head.php"); ?>

<body>
    <?php require ("part-header.php"); ?>

    <!--REGISTER-->
    <!--LOGIN-->
    <section class="login">
      <div class="container">
        <div class="container-form">
        <h2 class="alt-title">Registrarse</h2>
        <p class="login-info">Disfrutá del 1-click checkout, accedé a tus pedidos y gestioná tu cuenta.</p>
        <form action="#" method="post">
          <input type="text" name="email" value="" placeholder="Dirección de e-mail" required class="formField">
          <!-- <input type="text" name="nombre" value="" placeholder="Nombre" required class="formField">
          <input type="text" name="apellido" value="" placeholder="Apellido" required class="formField"> -->
          <input type="text" name="contrasena" value="" placeholder="Contraseña" required class="formField">
          <input type="submit" value="Crear cuenta" class="formBtn verde">
        </form>
        </div>
      </div>
      <div class="container aside">
        <p>¿Ya tenés cuenta en Mobili?</p><p><a href="login.html">Ingresar</a></p>
      </div>
    </section>

    <?php require ("part-footer.php"); ?>
    <?php require ("part-scripts.php"); ?>
  </body>
</html>
