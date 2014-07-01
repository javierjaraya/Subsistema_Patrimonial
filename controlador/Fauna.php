<?php

/**
 * Description of Fauna
 *
 * @author Pipe
 */

include_once '../controlador/FaunaImagen.php';

class Fauna {
    private $idFauna;
    private $nombreFauna;
    private $especie;
    private $descripcion;
    private $imagen;
    
    function __construct() {
        $this->imagen = new FaunaImagen();
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
        $this->imagen->setIdFauna($idFauna);
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
    
    public function setIdImagen($idImagen){
        $this->imagen->setIdImagen($idImagen);
    }

    public function setNombreImagen($nombre){
        $this->imagen->setNombre($nombre);
    }
    
    public function setRutaImagen($ruta){
        $this->imagen->setRuta($ruta);
    }

}
