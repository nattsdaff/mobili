<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Ecommerce de muebles">
    <meta name="author" content="Natalia, Tomás, Damián">
    <!--FAVICON-->
    <link rel="icon" href="img/favicon.png">
    <!--CSS EXTERNOS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!--CSS CUSTOM-->
    <link rel="stylesheet" href="css/styles.css">
    <title>m o b i l i • f a q</title>
</head>

<body>
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
                  <h1><a href="index.html"><img src="img/logo.png" alt="Mobili Logo" title="Mobili - Tienda de Muebles"></a></h1>
              </div>
              <div class="menu mobile">
                  <ul>
                      <li><a href="#">Productos</a></li>
                      <li><a href="#">Ambientes</a></li>
                      <li><a href="#">Ideas</a></li>
                      <li><a href="preguntas-frecuentes.html">FAQ</a></li>
                      <!--<li><a href="#">Contacto</a></li> Oculto temporalmente -->
                  </ul>
              </div>
          </div>
          <!--cierra .bloqueIzq-->
          <div class="bloqueDer">
                <a href="#"><i class="fas fa-search"></i></a>
                <a class="toggleUserMenu" href="javascript:void(0)"><i class="fas fa-user"></i></a>
                <!-- <a href="login.html"><i class="fas fa-user"></i></a> -->
                <a href="#"><i class="fas fa-shopping-bag"></i></a>
                <div class="userMenu mobile">
                    <ul>
                        <li><a href="login.html">Ingresar</a></li>
                        <li><a href="register.html">Registrarse</a></li>
                    </ul>
                </div>
            </div>
          <!--cierra. bloqueDer-->
      </nav>
  </header>

    <section class="preguntas-frecuentes">
        <div class="container">
            <h2 class="alt-title">PREGUNTAS FRECUENTES</h2>
            <p class="pregunta">¿Qué medios de pago aceptan?</p>
            <p class="respuesta">Podés abonar vía transferencia bancaria o con todas las tarjetas de crédito a través de MercadoPago.</p>
            <p class="pregunta">¿Qué métodos de envío tengo para elegir?</p>
            <p class="respuesta">Contamos con servicio de MercadoEnvíos.</p>
            <p class="pregunta">¿Qué sucede si el producto llega fallado o con algún raspón?</p>
            <p class="respuesta">Comunicate con nosotros al 0114441234.</p>
            <p class="pregunta">¿Cuál es el plazo de entrega de mi pedido?</p>
            <p class="respuesta">El plazo de entrega comienza a contar a partir de la confirmación del pago y varía (entre 1 y 10 días) de acuerdo con el producto adquirido y la dirección de entrega.</p>
            <p class="pregunta">¿Cuáles son las condiciones para acceder al envío gratis?</p>
            <p class="respuesta">Contamos con envío gratis para comprar mayores a $1999.</p>
            <p class="pregunta">¿Realizan entregas durante fines de semana y días feriados?</p>
            <p class="respuesta">Nuestra entregas son realizadas de lunes a viernes de 08:00hs. a 18:00hs.</p>
            <p class="pregunta">¿Realizan entregas internacionales?</p>
            <p class="respuesta">Nuestras entregas son realizadas solamente en la República Argentina.</p>
            <p class="pregunta">¿Tengo que registrarme en el sitio para poder comprar?</p>
            <p class="respuesta">Sí, es fundamental tener un registro en nuestra tienda, esto permitirá que usted haga los próximos pedidos de forma más rápida y facilitará sus compras. Usted podrá registrarse para recibir correos electrónicos de ofertas, con descuentos exclusivos, en los mejores productos del sitio. Quedará informado sobre las pre-ventas, promociones, y sobre las novedades del sitio.</p>
        </div>
    </section>
    <section class="newsletter">
        <div class="container">
            <h4 class="alt-title">Suscribite al newsletter</h4>
            <p class="newsletter-info">Recibí nuestras ofertas y novedades directamente en tu e-mail.</p>
            <form action="#" method="post">
                <input type="email" name="email" placeholder="Ingrese su e-mail" required class="formField">
                <input type="submit" value="Enviar" class="formBtn">
            </form>
        </div>
    </section>

    <!--FOOTER-->
    <footer>
        <div class="altMenu">
            <img src="img/logo-white.png" alt="Mobili Logo">
            <ul>
                <li><a href="#">Servicio al cliente</a></li>
                <li><a href="#">Nuestra empresa</a></li>
                <li><a href="preguntas-frecuentes.html">Preguntas frecuentes</a></li>
                <li><a href="#">Envios</a></li>
                <li><a href="#">Cambios y devoluciones</a></li>
            </ul>
        </div>
        <div class="copy">
            <p>2018&copy; Todos los derechos reservados.</p>
        </div>
    </footer>
    <!--END OF FOOTER-->

    <!--CDN jQuery v3.3.1-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--JS CUSTOM-->
    <script src="js/scripts.js"></script>
</body>

</html>
