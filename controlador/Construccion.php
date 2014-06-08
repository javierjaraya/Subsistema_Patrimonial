<?php
/**
 * Description of Construccion
 *
 * @author Pipe
 */
class Construccion {
    private $idConstruccion;
    private $superficie;
    private $idPredio;
    
    function __construct() {
        
    }
    public function getIdConstruccion() {
        return $this->idConstruccion;
    }

    public function getSuperficie() {
        return $this->superficie;
    }

    public function getIdPredio() {
        return $this->idPredio;
    }

    public function setIdConstruccion($idConstruccion) {
        $this->idConstruccion = $idConstruccion;
    }

    public function setSuperficie($superficie) {
        $this->superficie = $superficie;
    }

    public function setIdPredio($idPredio) {
        $this->idPredio = $idPredio;
    }


}
