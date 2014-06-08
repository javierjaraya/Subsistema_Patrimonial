<?php
/**
 * Description of Camino
 *
 * @author Pipe
 */
class Camino {
    private $idCamino;
    private $longitud;
    private $tipoSuperficie;
    private $idPredio;
    
    function __construct() {
        
    }
    public function getIdCamino() {
        return $this->idCamino;
    }

    public function getLongitud() {
        return $this->longitud;
    }

    public function getTipoSuperficie() {
        return $this->tipoSuperficie;
    }

    public function getIdPredio() {
        return $this->idPredio;
    }

    public function setIdCamino($idCamino) {
        $this->idCamino = $idCamino;
    }

    public function setLongitud($longitud) {
        $this->longitud = $longitud;
    }

    public function setTipoSuperficie($tipoSuperficie) {
        $this->tipoSuperficie = $tipoSuperficie;
    }

    public function setIdPredio($idPredio) {
        $this->idPredio = $idPredio;
    }


}
