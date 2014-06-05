<?php
/**
 * Description of Zona
 *
 * @author Javier
 */
class Zona {
    private $idZona;
    private $nombre;
    
    function __construct() {
        
    }
    
    public function getIdZona() {
        return $this->idZona;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setIdZona($idZona) {
        $this->idZona = $idZona;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
}
