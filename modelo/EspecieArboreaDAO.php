<?php

include_once 'Conexion.php';
include_once '../controlador/EspecieArborea.php';


/**
 * Description of EspecieArborea
 * 
 * @author Ivan
 */
class EspecieArboreaDAO {
    private $conexion;
    
    public function EspecieArboreaDAO(){
            $this->conexion= new Conexion();
    }
    
    public function findAll(){
        $this->conexion->conectar();
        $laConsulta = "SELECT * FROM especiearborea";
        $query = $this->conexion->ejecutar($laConsulta);
        $this->conexion->desconectar();
        return $query;
    }
}
?>
