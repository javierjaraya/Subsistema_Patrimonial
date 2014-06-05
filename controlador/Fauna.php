<?php

/**
 * Description of Fauna
 *
 * @author Pipe
 */
class Fauna {
    private $idFauna;
    private $nombreFauna;
    private $especie;
    private $descripcion;
    
    function __construct() {
        
    }
    public function getIdFauna() {
        return $this->idFauna;
    }

    public function getNombreFauna() {
        return $this->nombreFauna;
    }

    public function getEspecie() {
        return $this->especie;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setIdFauna($idFauna) {
        $this->idFauna = $idFauna;
    }

    public function setNombreFauna($nombreFauna) {
        $this->nombreFauna = $nombreFauna;
    }

    public function setEspecie($especie) {
        $this->especie = $especie;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


}
