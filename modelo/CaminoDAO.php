<?php

include_once 'Conexion.php';
include_once '../controlador/Camino.php';

/**
 * Description of CaminoDAO
 *
 * @author Javier
 */
class CaminoDAO {
    private $conexion;
    
    public function CaminoDAO(){
            $this->conexion= new Conexion();
    }
    
    public function findAll(){
        $caminos = array();
        $this->conexion->conectar();
        $laConsulta = "SELECT * FROM camino";
        
        $query = $this->conexion->ejecutar($laConsulta);
        $i = 0;
    
        while(ocifetch($query)){
            $camino = new Camino();
            $camino->setIdCamino(ociresult($query, "ID_CAMINO"));
            $camino->setLongitud(ociresult($query, "LONGITUD"));
            $camino->setTipoSuperficie(ociresult($query, "TIPO_SUPERFICIE"));
            $camino->setIdPredio(ociresult($query, "ID_PREDIO"));
            $caminos[$i] = $camino;
            $i++;
            
        }
        $this->conexion->desconectar();
        return $caminos;
    }
}
