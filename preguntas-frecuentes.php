<?php
    session_start();
    require "funciones.php";
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
<?php require("part-head.php"); ?>
<body>
    <?php require ("part-header.php"); ?>

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

    <?php require ("part-footer.php"); ?>
    <?php require ("part-scripts.php"); ?>
</body>

</html>
