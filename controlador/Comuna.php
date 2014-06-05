<?php

/**
 * Description of Comuna
 *
 * @author Javier
 */
class Comuna {
    private $idComuna;
    private $nombreComuna;
    private $idProvincia;
    
    function __construct() {
        
    }
    
    public function getIdComuna() {
        return $this->idComuna;
    }

    public function getNombreComuna() {
        return $this->nombreComuna;
    }

    public function getIdProvincia() {
        return $this->idProvincia;
    }

    public function setIdComuna($idComuna) {
        $this->idComuna = $idComuna;
    }

    public function setNombreComuna($nombreComuna) {
        $this->nombreComuna = $nombreComuna;
    }

    public function setIdProvincia($idProvincia) {
        $this->idProvincia = $idProvincia;
    }
}
