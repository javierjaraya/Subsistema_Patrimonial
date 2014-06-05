<?php

/**
 * Description of Pais
 *
 * @author Javier
 */

class Pais {
    private $idPais;
    private $nombrePais;
    
    function __construct() {
        
    }
    
    public function getIdPais() {
        return $this->idPais;
    }

    public function getNombrePais() {
        return $this->nombrePais;
    }

    public function setIdPais($idPais) {
        $this->idPais = $idPais;
    }

    public function setNombrePais($nombrePais) {
        $this->nombrePais = $nombrePais;
    }
}
