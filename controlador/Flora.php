<?php
/**
 * Description of Flora
 *
 * @author Pipe
 */
class Flora {
    private $idFlora;
    private $nombreFlora;
    private $especie;
    private $descripcion;
    
    function __construct() {
        
    }
    public function getIdFlora() {
        return $this->idFlora;
    }

    public function getNombreFlora() {
        return $this->nombreFlora;
    }

    public function getEspecie() {
        return $this->especie;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setIdFlora($idFlora) {
        $this->idFlora = $idFlora;
    }

    public function setNombreFlora($nombreFlora) {
        $this->nombreFlora = $nombreFlora;
    }

    public function setEspecie($especie) {
        $this->especie = $especie;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


}
