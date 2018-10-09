<?php
session_start();
if (isset($_COOKIE)) {
    setcookie('cookie_email', null, -1);
    setcookie('cookie_nombre', null, -1);
    setcookie('cookie_avatar', null, -1);
    setcookie('cookie_recordar', null, -1);
}
session_destroy();
header("Location:login.php");
