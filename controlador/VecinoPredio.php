<?php
/**
 * Description of VecinoPredio
 *
 * @author Pipe
 */
class VecinoPredio {
    private $idPredio;
    private $idVecino;
    private $estado;
    
    function __construct() {
        
    }
    public function getIdPredio() {
        return $this->idPredio;
    }

    public function getIdVecino() {
        return $this->idVecino;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setIdPredio($idPredio) {
        $this->idPredio = $idPredio;
    }

    public function setIdVecino($idVecino) {
        $this->idVecino = $idVecino;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }


}
