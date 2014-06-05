<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conservador
 *
 * @author Pipe
 */
class Conservador {
    private $idConservador;
    private $nombreConservador;
    
    function __construct() {
        
    }
    public function getIdConservador() {
        return $this->idConservador;
    }

    public function getNombreConservador() {
        return $this->nombreConservador;
    }
    public function setIdConservador($idConservador) {
        $this->idConservador = $idConservador;
    }

    public function setNombreConservador($nombreConservador) {
        $this->nombreConservador = $nombreConservador;
    }

            //put your code here
}
