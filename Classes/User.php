<?php

class User
{
    private $email;
    private $nombre;
    private $apellido;
    private $password;
    private $dia;
    private $mes;
    private $anio;
    private $codarea;
    private $telefono;
    private $dni;
    private $avatar;

    public function __construct($email, $nombre, $apellido, $password, $dia, $mes, $anio, $codarea, $telefono, $dni, $avatar)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->password = $password;
        $this->dia = $dia;
        $this->mes = $mes;
        $this->anio = $anio;
        $this->codarea = $codarea;
        $this->telefono = $telefono;
        $this->dni = $dni;
        $this->avatar = $avatar;
    }


    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * Get the value of apellido
     */ 
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }
    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get the value of nacimiento mes
     */ 
    public function getNacimientoMes()
    {
        return $this->mes;
    }
    /**
     * Set the value of nacimiento mes
     *
     * @return  self
     */ 
    public function setNacimientoMes($mes)
    {
        $this->mes = $mes;
    }
    /**
     * Get the value of nacimiento anio
     */ 
    public function getNacimientoAnio()
    {
        return $this->anio;
    }
    /**
     * Set the value of nacimiento anio
     *
     * @return  self
     */ 
    public function setNacimientoAnio($anio)
    {
        $this->anio = $anio;
    }
    /**
     * Get the value of codigo area
     */ 
    public function getCodigoArea()
    {
        return $this->codarea;
    }
    /**
     * Set the value of codigo area
     *
     * @return  self
     */ 
    public function setCodigoArea($codarea)
    {
        $this->codarea = $codarea;
    }
    /**
     * Get the value of telefono
     */ 
    public function getTelefono()
    {
        return $this->telefono;
    }
    /**
     * Set the value of telefono
     *
     * @return  self
     */ 
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }
    /**
     * Get the value of dni
     */ 
    public function getDni()
    {
        return $this->dni;
    }
    /**
     * Set the value of dni
     *
     * @return  self
     */ 
    public function setDni($dni)
    {
        $this->dni = $dni;
    }
    
    /**
     * Get the value of avatar
     */ 
    public function getAvatar()
    {
        return $this->avatar;
    }
    /**
     * Set the value of avatar
     *
     * @return  self
     */ 
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }
}