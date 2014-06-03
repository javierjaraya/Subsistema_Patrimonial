<?php

/**
 * Description of Cuenta
 *
 * @author Javier
 */
class Cuenta {
    private $idCuenta;
    private $fechaCreacion;
    private $password;
    private $estado;
    private $idPerfil;
    
    function __construct() {
        
    }
    
    public function getIdCuenta() {
        return $this->idCuenta;
    }

    public function getFechaCreacion() {
        return $this->fechaCreacion;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getIdPerfil() {
        return $this->idPerfil;
    }

    public function setIdCuenta($idCuenta) {
        $this->idCuenta = $idCuenta;
    }

    public function setFechaCreacion($fechaCreacion) {
        $this->fechaCreacion = $fechaCreacion;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setIdPerfil($idPerfil) {
        $this->idPerfil = $idPerfil;
    }
}
