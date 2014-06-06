<?php
/**
 * Description of Incidente
 *
 * @author Pipe
 */
class Incidente {
    private $idIncidente;
    private $descripcion;
    private $fechaIncidente;
    private $idVecino;
    
    function __construct() {
        
    }
    public function getIdIncidente() {
        return $this->idIncidente;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getFechaIncidente() {
        return $this->fechaIncidente;
    }

    public function getIdVecino() {
        return $this->idVecino;
    }

    public function setIdIncidente($idIncidente) {
        $this->idIncidente = $idIncidente;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setFechaIncidente($fechaIncidente) {
        $this->fechaIncidente = $fechaIncidente;
    }

    public function setIdVecino($idVecino) {
        $this->idVecino = $idVecino;
    }


}
