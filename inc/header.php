<header>
    <div class="topBar">
        <div class="promo">
            <p>25% off en todo cocina</p>
        </div>
        <div class="social">
            <a href="#"><i class="fab fa-facebook-square"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-pinterest"></i></a>
        </div>
    </div>
    <nav id="mainNav">
        <div class="bloqueIzq">
            <a class="toggle" href="javascript:void(0)"><i class="fas fa-bars"></i></a>
            <div class="logo">
                <h1><a href="index.php"><img src="assets/img/logo.png" alt="Mobili Logo" title="Mobili - Tienda de Muebles"></a></h1>
            </div>
            <div class="menu mobile">
                <ul>
                    <li><a href="#">Productos</a></li>
                    <li><a href="#">Ambientes</a></li>
                    <li><a href="#">Ideas</a></li>
                    <li><a href="preguntas-frecuentes.php">FAQ</a></li>
                    <!--<li><a href="#">Contacto</a></li> Oculto temporalmente -->
                </ul>
            </div>
        </div>
        <!--cierra .bloqueIzq-->
        <div class="bloqueDer">
            <a href="#"><i class="fas fa-search"></i></a>
            <?php if($_SESSION || isset($_COOKIE["cookie_recordar"])){ ?>
            <a class="toggleUserMenu" href="javascript:void(0)"><i class="far fa-user"></i></a>
            <div class="userMenu mobile">
                <p>Hola <?php echo (isset($_COOKIE["cookie_nombre"]))?$_COOKIE["cookie_nombre"]:$_SESSION["nombre"]; ?></p>
                <ul>
                    <li><a href="mi-cuenta.php">Mi cuenta</a></li>
                    <li><a href="logout.php">Cerrar sesión</a></li>
                </ul>
            </div>
             <?php } else { ?>
            <a class="toggleUserMenu" href="javascript:void(0)"><i class="fas fa-user"></i></a>
            <div class="userMenu mobile">
                <ul>
                    <li><a href="login.php">Ingresar</a></li>
                    <li><a href="register.php">Registrarse</a></li>
                </ul>
            </div>
            <?php } ?>
            <a href="#"><i class="fas fa-shopping-bag"></i></a>
        </div>
        <!--cierra. bloqueDer-->
    </nav>
</header>
