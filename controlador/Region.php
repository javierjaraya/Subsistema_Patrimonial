<?php

/**
 * Description of Region
 *
 * @author Javier
 */
class Region {
    private $idRegion;
    private $nombreRegion;
    private $idPais;
    
    function __construct() {
        
    }
    
    public function getIdRegion() {
        return $this->idRegion;
    }

    public function getNombreRegion() {
        return $this->nombreRegion;
    }

    public function getIdPais() {
        return $this->idPais;
    }

    public function setIdRegion($idRegion) {
        $this->idRegion = $idRegion;
    }

    public function setNombreRegion($nombreRegion) {
        $this->nombreRegion = $nombreRegion;
    }

    public function setIdPais($idPais) {
        $this->idPais = $idPais;
    }
}
