<?php

class User
{
  private $email;
  private $nombre;
  private $apellido;
  private $password;

  // OPCIONALES:
  private $fnacdia;
  private $fnacmes;
  private $fnacanio;
  private $telcod;
  private $telefono;
  // FIN OPCIONALES

  private $dni;

  public function __construct($email, $nombre, $apellido, $password, $fnacdia, $fnacmes, $fnacanio, $telcod, $telefono, $dni)
{
    $this->email = $email;
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->password = $password;
    // OPCIONALES
    $this->fnacdia = $fnacdia;
    $this->fnacmes = $fnacmes;
    $this->fnacanio = $fnacanio;
    $this->telcod = $telcod;
    $this->telefono = $telefono;
    // FIN OPCIONALES
    $this->dni = $dni;
}

public function getEmail()
{
  return $this->email;
}

public function setEmail($email)
{
  $this->email = $email;
}

public function getNombre()
{
  return $this->nombre;
}

public function setNombre($nombre)
{
  $this->nombre = $nombre;
}

public function getApellido()
{
  return $this->apellido;
}

public function setApellido($apellido)
{
  $this->apellido = $apellido;
}

public function getPassword()
{
  return $this->password;
}

public function setPassword($password)
{
  $this->password = $password;
}

// OPCIONALES:
public function getFNacDia()
{
  return $this->fnacdia;
}

public function setFNacDia($fnacdia)
{
  $this->fnacdia = $fnacdia;
}

public function getFNacMes()
{
  return $this->fnacmes;
}

public function setFNacMes($fnacmes)
{
  $this->fnacmes = $fnacmes;
}

public function getFNacAnio()
{
  return $this->fnacanio;
}

public function setFNacAnio($fnacanio)
{
  $this->fnacanio = $fnacanio;
}

public function getTelCod()
{
  return $this->telcod;
}

public function setTelCod($telcod)
{
  $this->telcod = $telcod;
}

public function getTelefono()
{
  return $this->telefono;
}

public function setTelefono($telefono)
{
  $this->telefono = $telefono;
}
// FIN OPCIONALES

public function getDni()
{
  return $this->dni;
}

public function setDni($dni)
{
  $this->dni = $dni;
}

}