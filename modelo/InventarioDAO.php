<?php

/**
 * Description of InventarioDAO
 *
 * @author Iván
 */

include_once 'Conexion.php';
include_once '../controlador/Inventario.php';
include_once 'interfaceDAO.php';

class InventarioDAO  implements interfaceDAO{
    private $conexion;

    public function InventarioDAO() {
        $this->conexion = new Conexion();
    }
    
    public function findInventarioByIdRodal($idRodal){
        $this->conexion->conectar();
        $estado = 1;
        $laConsulta = "SELECT * FROM inventario
            WHERE  ID_RODAL = '".$idRodal."'
                AND ESTADO = '".$estado."'
            ORDER BY ID_INVENTARIO";
        
        $query = $this->conexion->ejecutar($laConsulta);
        $this->conexion->desconectar();
        return $query;
    }
    
    public function findBetweenDate($idRodal, $fi, $ff){
        $inventarios = array();
        $this->conexion->conectar();
        $estado = 1;
        $laConsulta = "SELECT * FROM inventario
            WHERE  ID_RODAL = '".$idRodal."'
            AND (FECHA_MEDICION BETWEEN to_date('".$fi."', 'yyyy-mm-dd') AND to_date('".$ff."','yyyy-mm-dd'))
            AND ESTADO = '".$estado."'
            ORDER BY FECHA_MEDICION";
        $query = $this->conexion->ejecutar($laConsulta);
        while(ocifetch($query)){
            $inventario = new Inventario();
            $inventario->setAltura(ociresult($query,"ALTURA"));
            $inventario->setAlturaDominante(ociresult($query,"ALTURA_DOMINANTE"));
            $inventario->setAreaBasal(ociresult($query,"AREA_BASAL"));
            $inventario->setDiametroMedio(ociresult($query,"DIAMETRO_MEDIO"));
            $inventario->setFechaMedicion(ociresult($query,"FECHA_MEDICION"));
            $inventario->setIdInventario(ociresult($query,"ID_INVENTARIO"));
            $inventario->setIdRodal(ociresult($query,"ID_RODAL"));
            $inventario->setNumeroArboles(ociresult($query,"NUMERO_ARBOLES"));
            $inventario->setServicio(ociresult($query,"SERVICIO"));
            $inventario->setSistemaInventario(ociresult($query,"SISTEMA_INVENTARIO"));
            $inventario->setVolumen(ociresult($query,"VOLUMNE"));
            $inventarios[] = $inventario;
            
        }
        $this->conexion->desconectar();
        return $inventarios;
    }

    public function findAll() {
        
    }

    public function findByExample($object) {
        
    }

    public function findByID($id) {
        $inventarioEncontrado;
        $this->conexion->conectar();
        $laConsulta = "SELECT * FROM inventario WHERE ID_INVENTARIO = '".$id."'";
        $query = $this->conexion->ejecutar($laConsulta);
        while(ocifetch($query)){
            $inventarioEncontrado = new Inventario();
            $inventarioEncontrado->setIdInventario(ociresult($query, "ID_INVENTARIO"));
            $inventarioEncontrado->setServicio(ociresult($query, "SERVICIO"));
            $inventarioEncontrado->setSistemaInventario(ociresult($query, "SISTEMA_INVENTARIO"));
            $inventarioEncontrado->setDiametroMedio(ociresult($query, "DIAMETRO_MEDIO"));
            $inventarioEncontrado->setAlturaDominante(ociresult($query, "ALTURA_DOMINANTE"));
            $inventarioEncontrado->setAreaBasal(ociresult($query, "AREA_BASAL"));
            $inventarioEncontrado->setVolumen(ociresult($query, "VOLUMNE"));
            $inventarioEncontrado->setNumeroArboles(ociresult($query, "NUMERO_ARBOLES"));
            $inventarioEncontrado->setAltura(ociresult($query, "ALTURA"));
            $inventarioEncontrado->setFechaMedicion(ociresult($query, "FECHA_MEDICION"));
        }
        $this->conexion->desconectar();
        return $inventarioEncontrado;
    }

    public function findLikeAtrr($name) {
        
    }
    
    private function queryMaxID(){
        $consultaMaxId ="SELECT (max(id_inventario)+1) AS id FROM inventario";
        $queryId = $this->conexion->ejecutar($consultaMaxId);
        while(OCIFetch($queryId)){
            $id = ociresult($queryId, "ID");
        }
        return $id;
    }
    
    public function save($object) {
        $this->conexion->conectar();
        $id_inventario = $this->queryMaxID();
        $estado =1;  
        $laConsulta = "INSERT into INVENTARIO (ID_INVENTARIO, SERVICIO, SISTEMA_INVENTARIO, DIAMETRO_MEDIO, ALTURA_DOMINANTE, AREA_BASAL, VOLUMNE, NUMERO_ARBOLES, ALTURA, FECHA_MEDICION, ID_RODAL, ESTADO) 
            VALUES ('".$id_inventario."','".$object->getServicio()."','".$object->getSistemaInventario()."','".$object->getDiametroMedio()."','".$object->getAlturaDominante()."','".$object->getAreaBasal()."','".$object->getVolumen()."','".$object->getNumeroArboles()."','".$object->getAltura()."',to_date('".$object->getFechaMedicion()."', 'yyyy-mm-dd'),'".$object->getIdRodal()."','".$estado."')";

        $this->conexion->ejecutar($laConsulta);
        $this->conexion->desconectar();
    }

    public function update($object) {
        $this->conexion->conectar();
        echo "id: ".$object->getIdInventario();
        $laConsulta = "UPDATE INVENTARIO 
                        SET     SERVICIO = '".$object->getServicio()."',
                                SISTEMA_INVENTARIO = '".$object->getSistemaInventario()."',
                                DIAMETRO_MEDIO = '".$object->getDiametroMedio()."',
                                ALTURA_DOMINANTE = '".$object->getAlturaDominante()."',
                                AREA_BASAL = '".$object->getAreaBasal()."',
                                VOLUMNE = '".$object->getVolumen()."',
                                NUMERO_ARBOLES = '".$object->getNumeroArboles()."',
                                ALTURA = '".$object->getAltura()."',
                                FECHA_MEDICION = to_date('".$object->getFechaMedicion()."', 'yyyy-mm-dd')
                        WHERE ID_INVENTARIO='".$object->getIdInventario()."' ";
        echo $laConsulta;
        $this->conexion->ejecutar($laConsulta);
        $this->conexion->desconectar();
    }
    
    public function delete($id){
        $this->conexion->conectar();
        $estadoEliminado = 0;
        $laConsulta = "UPDATE INVENTARIO 
                        SET     
                            ESTADO='".$estadoEliminado."'   
                        WHERE ID_INVENTARIO=".$id." ";
        $this->conexion->ejecutar($laConsulta);
        $this->conexion->desconectar();
    }
}
