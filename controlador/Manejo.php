<?php
/**
 * Description of Manejo
 *
 * @author Pipe
 */
class Manejo {
    private $idManejo;
    private $fecha;
    private $actividad;
    private $superficie;
    private $descripcion;
    private $idRodal;
    
    function __construct() {
        
    }
    public function getIdManejo() {
        return $this->idManejo;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getActividad() {
        return $this->actividad;
    }

    public function getSuperficie() {
        return $this->superficie;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getIdRodal() {
        return $this->idRodal;
    }

    public function setIdManejo($idManejo) {
        $this->idManejo = $idManejo;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setActividad($actividad) {
        $this->actividad = $actividad;
    }

    public function setSuperficie($superficie) {
        $this->superficie = $superficie;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setIdRodal($idRodal) {
        $this->idRodal = $idRodal;
    }


}
