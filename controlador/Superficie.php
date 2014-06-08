<?php
/**
 * Description of Superficie
 *
 * @author Pipe
 */
class Superficie {
    private $idSuperficie;
    private $nombreSuperficie;
    
    function __construct() {
        
    }
    public function getIdSuperficie() {
        return $this->idSuperficie;
    }

    public function getNombreSuperficie() {
        return $this->nombreSuperficie;
    }

    public function setIdSuperficie($idSuperficie) {
        $this->idSuperficie = $idSuperficie;
    }

    public function setNombreSuperficie($nombreSuperficie) {
        $this->nombreSuperficie = $nombreSuperficie;
    }


}
