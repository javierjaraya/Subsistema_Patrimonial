<?php

/**
 * Description of Cuenta
 *
 * @author Javier
 */
class Cuenta {
    
    private $nombreEmpleado;
    private $idCuenta;
    private $fechaCreacion;
    private $password;
    private $estado;
    private $idPerfil;
    private $nombrePerfil;
    private $dniCta;
    
    function __construct() {
        
    }
    
    public function getNombreEmpleado() {
        return $this->nombreEmpleado;
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
    
    
    public function getNombrePerfil() {
        return $this->nombrePerfil;
    }
    
    public function getDniCta() {
        return $this->dniCta;
    }
    
    public function setNombreEmpleado($nombreEmpleado) {
        $this->nombreEmpleado = $nombreEmpleado;
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
    
    public function setNombrePerfil($perfil) {
        $this->nombrePerfil = $perfil;
    }
    
    public function setDniCta($dniCta) {
        $this->dniCta = $dniCta;
    }
}
?>
