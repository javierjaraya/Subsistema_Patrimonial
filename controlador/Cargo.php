<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cargo
 *
 * @author Pipe
 */
class Cargo {
    private $idCargo;
    private $nombreCargo;
    private $descripcion;   
    
    function __construct() {
        
    }
    
    public function getIdCargo() {
        return $this->idCargo;
    }

    public function getNombreCargo() {
        return $this->nombreCargo;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }
    public function setIdCargo($idCargo) {
        $this->idCargo = $idCargo;
    }

    public function setNombreCargo($nombreCargo) {
        $this->nombreCargo = $nombreCargo;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }



//put your code here
}
