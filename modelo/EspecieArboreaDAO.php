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
        $especies = array();
        $laConsulta = "SELECT * FROM especiearborea ORDER BY NOMBRE_ESPECIE_ARBOREA";
        $query = $this->conexion->ejecutar($laConsulta);
        while(ocifetch($query)){
             $especie = new EspecieArborea();
             $especie->setDescripcionEspecieArborea(ociresult($query, "DESCRIPCION"));
             $especie->setId(ociresult($query, "ID_ESPECIE_ARBOREA"));
             $especie->setNombre(ociresult($query, "NOMBRE_ESPECIE_ARBOREA"));
             $especies[] = $especie;
        }
        $this->conexion->desconectar();
        
        return $especies;
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
