<?php

/**
 * Description of Provincia
 *
 * @author Javier
 */
class Provincia {
    private $idProvincia;
    private $nombreProvincia;
    private $idRegion;
    
    function __construct() {
        
    }
    
    public function getIdProvincia() {
        return $this->idProvincia;
    }

    public function getNombreProvincia() {
        return $this->nombreProvincia;
    }

    public function getIdRegion() {
        return $this->idRegion;
    }

    public function setIdProvincia($idProvincia) {
        $this->idProvincia = $idProvincia;
    }

    public function setNombreProvincia($nombreProvincia) {
        $this->nombreProvincia = $nombreProvincia;
    }

    public function setIdRegion($idRegion) {
        $this->idRegion = $idRegion;
    }
}
