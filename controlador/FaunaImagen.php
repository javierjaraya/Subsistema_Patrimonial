<?php

/**
 * Description of FaunaImagen
 *
 * @author Pipe
 */
class FaunaImagen {
    private $idImagen;
    private $idFauna;
    private $nombre;
    private $binario;
    
    function __construct() {
        
    }
    public function getIdImagen() {
        return $this->idImagen;
    }

    public function getIdFauna() {
        return $this->idFauna;
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

    public function setIdFauna($idFauna) {
        $this->idFauna = $idFauna;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setBinario($binario) {
        $this->binario = $binario;
    }


}