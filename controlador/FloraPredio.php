<?php

/**
 * Description of FloraPredio
 *
 * @author Pipe
 */
class FloraPredio {
    private $idFlora;
    private $idPredio;
    private $estado;
    
    function __construct() {
        
    }
    public function getIdFlora() {
        return $this->idFlora;
    }

    public function getIdPredio() {
        return $this->idPredio;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setIdFlora($idFlora) {
        $this->idFlora = $idFlora;
    }

    public function setIdPredio($idPredio) {
        $this->idPredio = $idPredio;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }


}
