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
    private $idCarpeta;
    private $inscripcion;
    private $fechaInscripcion;
    private $contribucion;
    private $codigo;
    private $rol;
    private $conservadorBienRaiz;
    private $idPredio;
    
    function __construct() {
        
    }
    public function getIdCarpeta() {
        return $this->idCarpeta;
    }

    public function getInscripcion() {
        return $this->inscripcion;
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

        //put your code here
}
