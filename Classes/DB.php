<?php

abstract class DB 
{
    abstract protected static function guardarUsuario(User $user, $db);
}