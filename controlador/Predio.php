<?php

/**
 * Description of Predio
 *
 * @author Renato
 */
class Predio {
    private $idPredio;
    private $nombre;
    private $superficie;
    private $estado;
    private $valorComercial;
    private $idComuna;
    private $idZona;
    private $idEmpresa;
            
    function _construct(){}
    public function getIdPredio() {
        return $this->idPredio;
    }

    public function setIdPredio($idPredio) {
        $this->idPredio = $idPredio;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getSuperficie() {
        return $this->superficie;
    }

    public function setSuperficie($superficie) {
        $this->superficie = $superficie;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getValorComercial() {
        return $this->valorComercial;
    }

    public function setValorComercial($valorComercial) {
        $this->valorComercial = $valorComercial;
    }

    public function getIdComuna() {
        return $this->idComuna;
    }

    public function setIdComuna($idComuna) {
        $this->idComuna = $idComuna;
    }

    public function getIdZona() {
        return $this->idZona;
    }

    public function setIdZona($idZona) {
        $this->idZona = $idZona;
    }

    public function getIdEmpresa() {
        return $this->idEmpresa;
    }

    public function setIdEmpresa($idEmpresa) {
        $this->idEmpresa = $idEmpresa;
    }
}
?>
