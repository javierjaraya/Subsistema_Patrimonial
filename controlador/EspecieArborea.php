<?php



class EspecieArborea{
    
    private $idEspecieArborea;
    private $nombreEspecieArborea;
    private $descripcionEspecieArborea;
            
    function __construct() {
        
    }
    public function getId() {
        return $this->idEspecieArborea;
    }

    public function setId($idEspecieArborea) {
        $this->idEspecieArborea = $idEspecieArborea;
    }

    public function getNombre() {
        return $this->nombreEspecieArborea;
    }

    public function setNombre($nombreEspecieArborea) {
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
