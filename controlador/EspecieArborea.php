<?php

/**
 * Description of EspecieArborea
 *
 * @author Pipe
 */
class EspecieArborea {
    private $idEspecieArborea;
    private $nombreEspecieArborea;
    private $descripcion;
    
    function __construct() {
        
    }
    public function getIdEspecieArborea() {
        return $this->idEspecieArborea;
    }

    public function getNombreEspecieArborea() {
        return $this->nombreEspecieArborea;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setIdEspecieArborea($idEspecieArborea) {
        $this->idEspecieArborea = $idEspecieArborea;
    }

    public function setNombreEspecieArborea($nombreEspecieArborea) {
        $this->nombreEspecieArborea = $nombreEspecieArborea;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


}
