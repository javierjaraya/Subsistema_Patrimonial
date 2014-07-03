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
    
    public function queryMaxID(){
        $consultaMaxId ="SELECT (max(id_camino)+1) AS id FROM camino";
        $this->conexion->conectar();
        $queryId = $this->conexion->ejecutar($consultaMaxId);
        while(OCIFetch($queryId)){
            $id = ociresult($queryId, "ID");
        }
        $this->conexion->desconectar();
        return $id;
    }
    
    public function save($camino){
        $this->conexion->conectar();
        $laConsulta = "INSERT into CAMINO (ID_CAMINO, LONGITUD, TIPO_SUPERFICIE, ID_PREDIO) 
            VALUES ('".$camino->getIdCamino()."','".$camino->getLongitud()."','".$camino->getTipoSuperficie()."','".$camino->getIdPredio()."')";
        $this->conexion->ejecutar($laConsulta);
        $this->conexion->desconectar();
    }
    
    public function actualizarCaminoDAO($camino) {
        $this->conexion->conectar();
        $laConsulta = "UPDATE camino 
                        SET     ID_CAMINO='".$camino->getIdCamino()."',
                                LONGITUD='".$camino->getLongitud()."',
                                TIPO_SUPERFICIE='".$camino->getTipoSuperficie()."',
                                ID_PREDIO='".$camino->getIdPredio()."'   
                               
                        WHERE ID_CAMINO='".$camino->getIdCamino()."' ";
        
        $this->conexion->ejecutar($laConsulta);
        $this->conexion->desconectar();
    }
    
    public function eliminarCamino($id){
        $this->conexion->conectar();
        $consulta = "DELETE FROM camino WHERE ID_CAMINO = '".$id."'";
        $this->conexion->ejecutar($consulta);
        $this->conexion->desconectar();
    }
}
