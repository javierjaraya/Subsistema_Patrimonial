<?php
/**
 * Description of Vecino
 *
 * @author Pipe
 */
class Vecino {
    private $idVecino;
    private $descripcion;
    private $etnia;
    
    function __construct() {
        
    }
    public function getIdVecino() {
        return $this->idVecino;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getEtnia() {
        return $this->etnia;
    }

    public function setIdVecino($idVecino) {
        $this->idVecino = $idVecino;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setEtnia($etnia) {
        $this->etnia = $etnia;
    }


}
