<?php

include_once 'Conexion.php';
include_once '../controlador/EspecieArborea.php';

class EspecieArborea {
    private $cone;
    
    public function EspecieArborea(){
            $this->cone= new Conexion();
    }
    
    public function findAll($idRodal){
        $this->cone->conectar();
        $estadoEliminado = 0;
        $laConsulta = "SELECT * 
            FROM especiearborea
            WHERE ID_RODAL = '".$idRodal."'";
        $this->cone->ejecutar($laConsulta);
        $this->cone->desconectar();
    }
}
?>
