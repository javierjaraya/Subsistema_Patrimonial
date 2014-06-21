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
        $laConsulta = "SELECT camino.ID_CAMINO, camino.LONGITUD, superficie.NOMBRE_SUPERFICIE AS TIPO_SUPERFICIE, predio.NOMBRE as PREDIO
                    FROM predio JOIN (camino JOIN superficie ON camino.TIPO_SUPERFICIE = superficie.id_superficie) ON predio.ID_PREDIO = camino.ID_PREDIO ";
        
        $query = $this->conexion->ejecutar($laConsulta);
        $i = 0;
    
        while(ocifetch($query)){
            $camino = new Camino();
            $camino->setIdCamino(ociresult($query, "ID_CAMINO"));
            $camino->setLongitud(ociresult($query, "LONGITUD"));
            $camino->setTipoSuperficie(ociresult($query, "TIPO_SUPERFICIE"));
            $camino->setIdPredio(ociresult($query, "PREDIO"));
            $caminos[$i] = $camino;
            $i++;
            
        }
        $this->conexion->desconectar();
        return $caminos;
    }
    
    public function findById($idCamino){
        $camino = new Camino();
        $this->conexion->conectar();
        $laConsulta = "SELECT * FROM camino WHERE camino.ID_CAMINO = $idCamino";
        $query = $this->conexion->ejecutar($laConsulta);
        
        while(ocifetch($query)){
            $camino->setIdCamino(ociresult($query, "ID_CAMINO"));
            $camino->setLongitud(ociresult($query, "LONGITUD"));
            $camino->setTipoSuperficie(ociresult($query, "TIPO_SUPERFICIE"));
            $camino->setIdPredio(ociresult($query, "ID_PREDIO"));
        }
        $this->conexion->desconectar();
        return $camino;
    }
    
    public function save($camino){
        $this->conexion->conectar();
        $laConsulta = "INSERT into CAMINO (ID_CAMINO, LONGITUD, TIPO_SUPERFICIE, TIPO_SUPERFICIE) 
            VALUES ('".$camino->getIdCamino()."','".$camino->getLongitud()."','".$camino->getTipoSuperficie()."','".$camino->getIdPredio()."')";
        $this->cone->ejecutar($laConsulta);
        $this->cone->desconectar();
    }
}
