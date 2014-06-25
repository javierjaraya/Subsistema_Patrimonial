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
        $laConsulta = "SELECT * FROM inventario
            WHERE  ID_RODAL = '".$idRodal."'
            ORDER BY ID_INVENTARIO";
        
        $query = $this->conexion->ejecutar($laConsulta);
        $this->conexion->desconectar();
        return $query;
    }
    
    public function findBetweenDate($idRodal, $fi, $ff){
        $inventarios = array();
        $this->conexion->conectar();
        $laConsulta = "SELECT * FROM inventario
            WHERE  ID_RODAL = '".$idRodal."'
            AND (FECHA_MEDICION BETWEEN to_date('".$fi."', 'yyyy-mm-dd') AND to_date('".$ff."','yyyy-mm-dd'))
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
        
    }

    public function findLikeAtrr($name) {
        
    }
    
    private function queryMaxID(){
        $consultaMaxId ="SELECT (max(id_inventario)+1) AS id FROM inventario";
        $queryId = $this->cone->ejecutar($consultaMaxId);
        while(OCIFetch($queryId)){
            $id = ociresult($queryId, "ID");
        }
        return $id;
    }
    
    public function save($object) {
        $this->cone->conectar();
        $id_inventario = queryMaxID();
            
        $laConsulta = "INSERT into INVENTARIO (ID_INVENTARIO, SERVICIO, SISTEMA_INVENTARIO, DIAMETRO_MEDIO, ALTURA_DOMINANTE, AREA_BASAL, VOLUMNE, NUMERO_ARBOLES, ALTURA, FECHA_MEDICION, ID_RODAL) 
            VALUES ('".$id_inventario."','".$object->getServicio()."','".$object->getSistemaInventario()."','".$object->getDiametroMedio()."','".$object->getAlturaDominante()."','".$object->getAreaBasal()."','".$object->getVolumen()."','".$object->getNumeroArboles()."','".$object->getAltura()."',to_date('".$object->getFechaMedicion()."', 'yyyy-mm-dd'),'".$object->getIdRodal()."')";
        echo $laConsulta;
        $this->cone->ejecutar($laConsulta);
        $this->cone->desconectar();
    }

    public function update($object) {
        
    }
    
    public function delete($id){
        $this->cone->conectar();
        $estadoEliminado = 0;
        $laConsulta = "UPDATE inventario 
                        SET     
                            ESTADO='".$estadoEliminado."'   
                        WHERE ID_PREDIO='".$id."' ";
        $this->cone->ejecutar($laConsulta);
        $this->cone->desconectar();
    }
}
