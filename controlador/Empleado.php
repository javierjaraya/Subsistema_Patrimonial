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
    private $apPaternoEmpleado;
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

    public function getApPaternoEmpleado() {
        return $this->apPaternoEmpleado;
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
    public function setDni($dni) {
        $this->dni = $dni;
    }

    public function setNombreEmpleado($nombreEmpleado) {
        $this->nombreEmpleado = $nombreEmpleado;
    }

    public function setApPaternoEmpleado($apPaternoEmpleado) {
        $this->apPaternoEmpleado = $apPaternoEmpleado;
    }

    public function setApMaternoEmpleado($apMaternoEmpleado) {
        $this->apMaternoEmpleado = $apMaternoEmpleado;
    }

    public function setFechaIngreso($fechaIngreso) {
        $this->fechaIngreso = $fechaIngreso;
    }

    public function setIdCargo($idCargo) {
        $this->idCargo = $idCargo;
    }

    public function setIdCuenta($idCuenta) {
        $this->idCuenta = $idCuenta;
    }
}
