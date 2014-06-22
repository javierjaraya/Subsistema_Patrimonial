<?php

include_once 'Conexion.php';
include_once '../controlador/EspecieArborea.php';


/**
 * Description of PredioDAO
 * 
 * @author Renato
 */
class EspecieArboreaDAO {
    private $cone;
    
    public function PredioDAO(){
            $this->cone= new Conexion();
    }
    
    public function findAll(){
        
        $this->cone->conectar();
        $laConsulta = "SELECT * FROM especiearborea";
        $query = $this->cone->ejecutar($laConsulta);
        $this->cone->desconectar();
        return $query;
    }
}
?>
