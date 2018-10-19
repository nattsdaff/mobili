<?php
    require 'funciones.php';
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<?php require("inc/head.php"); ?>
<body>
    <?php require("inc/header.php"); ?>

    <!--MAIN SLIDER-->
    <section class="slider">
        <div><img src="img/home/slider-1.jpg" alt=""></div>
        <div><img src="img/home/slider-2.jpg" alt=""></div>
        <div><img src="img/home/slider-3.jpg" alt=""></div>
    </section>
    <!--/MAIN SLIDER-->

    <!--PRODUCTOS DESEADOS-->
    <section class="deseados">
        <h2 class="main-title">Los m&aacute;s deseados</h2>
        <div class="deseados-slider">
            <div class="item">
                <a href="#">
                    <img src="img/deseados/deseados-1.jpg" alt="">
                    <h4 class="deseados-title">St. Charles Desk</h4>
                    <p class="deseados-price">$13500</p>
               </a>
            </div>
            <div class="item">
                <a href="#">
                    <img src="img/deseados/deseados-2.jpg" alt="">
                    <h4 class="deseados-title">New York Violet Dining Arm Chair</h4>
                    <p class="deseados-price">$14000</p>
                </a>
            </div>
            <div class="item">
                <a href="#">
                    <img src="img/deseados/deseados-3.jpg" alt="">
                    <h4 class="deseados-title">Catre Napper</h4>
                    <p class="deseados-price">$13000</p>
               </a>
            </div>
            <div class="item">
                <a href="#">
                    <img src="img/deseados/deseados-4.jpg" alt="">
                    <h4 class="deseados-title">Sillón Byron</h4>
                    <p class="deseados-price">$15000</p>
                </a>
            </div>
            <div class="item">
                <a href="#">
                    <img src="img/deseados/deseados-5.jpg" alt="">
                    <h4 class="deseados-title">Banquito Eco</h4>
                    <p class="deseados-price">$7300</p>
               </a>
            </div>
            <div class="item">
                <a href="#">
                    <img src="img/deseados/deseados-6.jpg" alt="">
                    <h4 class="deseados-title">Sillón Amore Mío</h4>
                    <p class="deseados-price">$16380</p>
                </a>
            </div>
        </div>
    </section>
    <!--/PRODUCTOS DESEADOS-->

    <section class="features">
        <div class="features-item">
            <span class="features-icon"><i class="fas fa-shopping-basket"></i></span>
            <h5 class="features-title">Comprá online. Recibí en tienda</h5>
        </div>
        <div class="features-item">
            <span class="features-icon"><i class="fas fa-shipping-fast"></i></span>
            <h5 class="features-title">Servicio de entrega rápido y económico</h5>
        </div>
        <div class="features-item">
            <span class="features-icon"><i class="fas fa-lock"></i></span>
            <h5 class="features-title">Compra fácil y 100% segura</h5>
        </div>
    </section>

    <!--TUS AMBIENTES-->
    <section class="ambientes">
      <h2 class="main-title">TUS AMBIENTES</h2>
      <a href="#">
        <div class="overlay"><h4 class="ambientes-title">Living room</h4></div>
        <img src="img/ambientes/ambientes-livingroom.jpg" alt="">
      </a>
      <a href="#">
        <div class="overlay"><h4 class="ambientes-title">Cocina</h4></div>
        <img src="img/ambientes/ambientes-kitchen.jpg" alt="">
      </a>
      <a href="#">
        <div class="overlay"><h4 class="ambientes-title">Habitación</h4></div>
        <img src="img/ambientes/ambientes-habitacion.jpg" alt="">
      </a>
      <a href="#">
        <div class="overlay"><h4 class="ambientes-title">Niños</h4></div>
        <img src="img/ambientes/ambientes-kids-room.jpg" alt="">
      </a>
      <a href="#">
        <div class="overlay"><h4 class="ambientes-title">Baño</h4></div>
        <img src="img/ambientes/ambientes-bathroom.jpg" alt="">
      </a>
      <a href="#">
        <div class="overlay"><h4 class="ambientes-title">Oficina</h4></div>
        <img src="img/ambientes/ambientes-oficina.jpg" alt="">
      </a>
    </section>
    <!--/TUS AMBIENTES-->
    <?php require ("inc/footer.php"); ?>
    <?php require ("inc/scripts.php"); ?>

</body>
</html>
