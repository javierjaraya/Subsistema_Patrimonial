<?php
/**
 * Description of Inventario
 *
 * @author Pipe
 */
class Inventario {
    private $idInventario;
    private $servicio;
    private $sistemaInventario;
    private $diametroMedio;
    private $alturaDominante;
    private $areaBasal;
    private $volumen;
    private $numeroArboles;
    private $altura;
    private $fechaMedicion;
    private $idRodal;
    
    function __construct() {
        
    }
    public function getIdInventario() {
        return $this->idInventario;
    }

    public function getServicio() {
        return $this->servicio;
    }

    public function getSistemaInventario() {
        return $this->sistemaInventario;
    }

    public function getDiametroMedio() {
        return $this->diametroMedio;
    }

    public function getAlturaDominante() {
        return $this->alturaDominante;
    }

    public function getAreaBasal() {
        return $this->areaBasal;
    }

    public function getVolumen() {
        return $this->volumen;
    }

    public function getNumeroArboles() {
        return $this->numeroArboles;
    }

    public function getAltura() {
        return $this->altura;
    }

    public function getFechaMedicion() {
        return $this->fechaMedicion;
    }

    public function getIdRodal() {
        return $this->idRodal;
    }

    public function setIdInventario($idInventario) {
        $this->idInventario = $idInventario;
    }

    public function setServicio($servicio) {
        $this->servicio = $servicio;
    }

    public function setSistemaInventario($sistemaInventario) {
        $this->sistemaInventario = $sistemaInventario;
    }

    public function setDiametroMedio($diametroMedio) {
        $this->diametroMedio = $diametroMedio;
    }

    public function setAlturaDominante($alturaDominante) {
        $this->alturaDominante = $alturaDominante;
    }

    public function setAreaBasal($areaBasal) {
        $this->areaBasal = $areaBasal;
    }

    public function setVolumen($volumen) {
        $this->volumen = $volumen;
    }

    public function setNumeroArboles($numeroArboles) {
        $this->numeroArboles = $numeroArboles;
    }

    public function setAltura($altura) {
        $this->altura = $altura;
    }

    public function setFechaMedicion($fechaMedicion) {
        $this->fechaMedicion = $fechaMedicion;
    }

    public function setIdRodal($idRodal) {
        $this->idRodal = $idRodal;
    }


}
