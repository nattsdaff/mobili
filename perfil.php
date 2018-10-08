<?php
session_start();
require("part-head.php");
?>
<body>
    <img width="300px" src="<?php echo $_COOKIE["cookie_avatar"]; ?>" alt="">
    <h1>Bienvenido <?php echo $_SESSION['email']; ?></h1>
  </body>
</html>
