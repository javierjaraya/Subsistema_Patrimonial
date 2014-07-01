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
    private $ruta;
    
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

    public function getRuta() {
        return $this->ruta;
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

    public function setRuta($ruta) {
        $this->ruta = $ruta;
    }
}
