<?php



class EspecieArborea{
    
    private $idEspecieArborea;
    private $nombreEspecieArborea;
    private $descripcionEspecieArborea;
            
    function __construct() {
        
    }
    public function getIdEspecieArborea() {
        return $this->idEspecieArborea;
    }

    public function setIdEspecieArborea($idEspecieArborea) {
        $this->idEspecieArborea = $idEspecieArborea;
    }

    public function getNombreEspecieArborea() {
        return $this->nombreEspecieArborea;
    }

    public function setNombreEspecieArborea($nombreEspecieArborea) {
        $this->nombreEspecieArborea = $nombreEspecieArborea;
    }

    public function getDescripcionEspecieArborea() {
        return $this->descripcionEspecieArborea;
    }

    public function setDescripcionEspecieArborea($descripcionEspecieArborea) {
        $this->descripcionEspecieArborea = $descripcionEspecieArborea;
    }


    
    
}
?>
