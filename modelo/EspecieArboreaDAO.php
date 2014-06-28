<?php

include_once 'Conexion.php';
include_once '../controlador/EspecieArborea.php';


/**
 * Description of EspecieArborea
 * 
 * @author Ivan
 */
class EspecieArboreaDAO implements interfaceDAO{
    private $conexion;
    
    public function EspecieArboreaDAO(){
            $this->conexion= new Conexion();
    }
    
    public function findAll(){
        $this->conexion->conectar();
        $laConsulta = "SELECT * FROM especiearborea ORDER BY NOMBRE_ESPECIE_ARBOREA";
        $query = $this->conexion->ejecutar($laConsulta);
        $this->conexion->desconectar();
    }

    public function findByExample($object) {
        
    }

    public function findByID($id) {
        
    }

    public function findLikeAtrr($name) {
        
    }

    public function save($object) {
        
    }

    public function update($object) {
        
    }
}
?>
