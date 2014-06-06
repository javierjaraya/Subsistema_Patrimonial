<?php
/**
 * Description of UsoSuelo
 *
 * @author Pipe
 */
class UsoSuelo {
    private $idUsoSuelo;
    private $fechaInicio;
    private $fechaTermino;
    private $superficie;
    private $estado;
    private $idTipoUso;
    private $idPredio;
    
    function __construct() {
        
    }
    public function getIdUsoSuelo() {
        return $this->idUsoSuelo;
    }

    public function getFechaInicio() {
        return $this->fechaInicio;
    }

    public function getFechaTermino() {
        return $this->fechaTermino;
    }

    public function getSuperficie() {
        return $this->superficie;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getIdTipoUso() {
        return $this->idTipoUso;
    }

    public function getIdPredio() {
        return $this->idPredio;
    }

    public function setIdUsoSuelo($idUsoSuelo) {
        $this->idUsoSuelo = $idUsoSuelo;
    }

    public function setFechaInicio($fechaInicio) {
        $this->fechaInicio = $fechaInicio;
    }

    public function setFechaTermino($fechaTermino) {
        $this->fechaTermino = $fechaTermino;
    }

    public function setSuperficie($superficie) {
        $this->superficie = $superficie;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setIdTipoUso($idTipoUso) {
        $this->idTipoUso = $idTipoUso;
    }

    public function setIdPredio($idPredio) {
        $this->idPredio = $idPredio;
    }


}
