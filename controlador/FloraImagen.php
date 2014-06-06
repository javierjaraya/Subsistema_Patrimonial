<?php

/**
 * Description of FloraImagen
 *
 * @author Pipe
 */
class FloraImagen {
    private $idImagen;
    private $idFlora;
    private $nombre;
    private $binario;
    
    function __construct() {
        
    }
    public function getIdImagen() {
        return $this->idImagen;
    }

    public function getIdFlora() {
        return $this->idFlora;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getBinario() {
        return $this->binario;
    }

    public function setIdImagen($idImagen) {
        $this->idImagen = $idImagen;
    }

    public function setIdFlora($idFlora) {
        $this->idFlora = $idFlora;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setBinario($binario) {
        $this->binario = $binario;
    }


}
