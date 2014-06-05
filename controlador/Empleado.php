<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Empleado
 *
 * @author Pipe
 */
class Empleado {
    private $dni;
    private $nombreEmpleado;
    private $apPateroEmpleado;
    private $apMaternoEmpleado;
    private $fechaIngreso;
    private $idCargo;
    private $idCuenta;

    function __construct() {
        
    }
    public function getDni() {
        return $this->dni;
    }

    public function getNombreEmpleado() {
        return $this->nombreEmpleado;
    }

    public function getApPateroEmpleado() {
        return $this->apPateroEmpleado;
    }

    public function getApMaternoEmpleado() {
        return $this->apMaternoEmpleado;
    }

    public function getFechaIngreso() {
        return $this->fechaIngreso;
    }

    public function getIdCargo() {
        return $this->idCargo;
    }

    public function getIdCuenta() {
        return $this->idCuenta;
    }

        //put your code here
}
