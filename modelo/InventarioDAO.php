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

    public function save($object) {
        
    }

    public function update($object) {
        
    }
}
