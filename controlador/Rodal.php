<?php
/**
 * Description of Rodal
 *
 * @author Pipe
 */
class Rodal {
    private $idRodal;
    private $anioPlantacion;
    private $superficie;
    private $valorComercial;
    private $idEspecieArborea;
    private $idPredio;
    private $manejo;
    private $zonaCrecimiento;
    
    function __construct() {
        
    }
    public function getIdRodal() {
        return $this->idRodal;
    }

    public function getAnioPlantacion() {
        return $this->anioPlantacion;
    }

    public function getSuperficie() {
        return $this->superficie;
    }

    public function getValorComercial() {
        return $this->valorComercial;
    }

    public function getIdEspecieArborea() {
        return $this->idEspecieArborea;
    }

    public function getIdPredio() {
        return $this->idPredio;
    }

    public function getManejo() {
        return $this->manejo;
    }

    public function getZonaCrecimiento() {
        return $this->zonaCrecimiento;
    }

    public function setIdRodal($idRodal) {
        $this->idRodal = $idRodal;
    }

    public function setAnioPlantacion($anioPlantacion) {
        $this->anioPlantacion = $anioPlantacion;
    }

    public function setSuperficie($superficie) {
        $this->superficie = $superficie;
    }

    public function setValorComercial($valorComercial) {
        $this->valorComercial = $valorComercial;
    }

    public function setIdEspecieArborea($idEspecieArborea) {
        $this->idEspecieArborea = $idEspecieArborea;
    }

    public function setIdPredio($idPredio) {
        $this->idPredio = $idPredio;
    }

    public function setManejo($manejo) {
        $this->manejo = $manejo;
    }

    public function setZonaCrecimiento($zonaCrecimiento) {
        $this->zonaCrecimiento = $zonaCrecimiento;
    }


}
