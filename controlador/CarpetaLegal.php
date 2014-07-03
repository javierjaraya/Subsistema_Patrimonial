<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CarpetaLegal
 *
 * @author Pipe
 */
class CarpetaLegal {
 
    private $fechaInscripcion;
    private $contribucion;
    private $codigo;
    private $rol;
    private $conservadorBienRaiz;
    private $idPredio;
    private $estado;
    
    function __construct() {
        
    }

    public function getFechaInscripcion() {
        return $this->fechaInscripcion;
    }

    public function getContribucion() {
        return $this->contribucion;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getRol() {
        return $this->rol;
    }

    public function getConservadorBienRaiz() {
        return $this->conservadorBienRaiz;
    }

    public function getIdPredio() {
        return $this->idPredio;
    }
    
    public function getEstado() {
        return $this->estado;
    }

    public function setFechaInscripcion($fechaInscripcion) {
        $this->fechaInscripcion = $fechaInscripcion;
    }

    public function setContribucion($contribucion) {
        $this->contribucion = $contribucion;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }

    public function setConservadorBienRaiz($conservadorBienRaiz) {
        $this->conservadorBienRaiz = $conservadorBienRaiz;
    }

    public function setIdPredio($idPredio) {
        $this->idPredio = $idPredio;
    }
    
    public function setEstado($estado) {
        $this->estado = $estado;
    }
    //put your code here
}
