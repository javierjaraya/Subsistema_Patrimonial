<?php

/**
 * Description of FaunaPredio
 *
 * @author Pipe
 */
class FaunaPredio {
    private $idFauna;
    private $idPredio;
    private $estado;
    
    function __construct() {
        
    }
    public function getIdFauna() {
        return $this->idFauna;
    }

    public function getIdPredio() {
        return $this->idPredio;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setIdFauna($idFauna) {
        $this->idFauna = $idFauna;
    }

    public function setIdPredio($idPredio) {
        $this->idPredio = $idPredio;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }


}
